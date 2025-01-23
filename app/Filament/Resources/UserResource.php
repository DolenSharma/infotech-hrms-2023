<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use Livewire\TemporaryUploadedFile;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

     protected static ?int $navigationSort = 1;
     protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->label('Name')
                        ->placeholder('Name')
                        ->unique(ignoreRecord:true)
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->label('Email')
                        ->unique(ignoreRecord:true)
                        ->required()
                        ->placeholder('example@example.com')
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('email_verified_at'),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->dehydrated(fn ($state) => filled($state))
                        ->required(fn (Page $livewire) => ($livewire instanceof CreateUser))
                        ->maxLength(255),
                    Forms\Components\Select::make('roles')
                        ->multiple()
                       ->relationship('roles', 'name')->preload(),
                    Forms\Components\FileUpload::make('avatar')
                        ->avatar()
                        ->label('Avatar')
                        ->autofocus()
                        ->image()
                        ->storeFileNamesIn('users-avatar-original')
                        // ->enableDownload()
                        ->imagePreviewHeight('150')
                        // ->enableOpen()
                        ->minSize(100)
                        ->maxSize(102400)
                        ->disk('public')
                        ->directory('users-avatar')
                        ->preserveFilenames()
                        ->getUploadedFileNameForStorageUsing(
                            function (TemporaryUploadedFile $file): string {
                                $name = auth()->user()->name ?? 'default-username'; // Replace 'default-username' if needed
                                return (string) str($file->getClientOriginalName())
                                    ->prepend("avatar-uploaded-by-{$name}-");
                            }
                        )
                        ->uploadButtonPosition('right') // Set the position of the upload button.
                        ->imageCropAspectRatio('1:1')
                        ->imageResizeTargetHeight(150) // Resize images to this height (in pixels) when they are uploaded.
                        ->imageResizeTargetWidth(150), // Resize images to this width (in pixels) when they are uploaded.
                ])->columns(4)
                    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\ImageColumn::make('avatar')
                                ->label('Avatar'),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('roles.name')->searchable()->label('Role Name'),
                Tables\Columns\BooleanColumn::make('email_verified_at')->label('Verified'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M j, Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('M j, Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')
                ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
               Tables\Filters\Filter::make('unverified')
                ->query(fn (Builder $query): Builder => $query->whereNull('email_verified_at')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    
}
