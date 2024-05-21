<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReferralResource\Pages;
use App\Models\Referral;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;

class ReferralResource extends Resource
{
    protected static ?string $model = Referral::class;

    protected static ?string $navigationIcon = 'heroicon-s-academic-cap';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'For Our Partners';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
             Forms\Components\Select::make('post_title')
                    ->relationship('post', 'title')->preload()
                    ->autofocus()
                    ->required(),
                    Forms\Components\TextInput::make('email_id')
                    ->email()
                    ->label('Email')
                    ->unique(ignoreRecord:true)
                    ->required()
                    ->placeholder('example@example.com')
                    ->maxLength(255)
                    ->autofocus(),
                    Forms\Components\TextInput::make('contact_number')
                    ->maxLength('12')
                    ->required()
                    ->autofocus()
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                    Forms\Components\TextInput::make('company_name')
                    ->autofocus()
                    ->required()
                    ->minLength(2)
                    ->maxLength(255),
                    FileUpload::make('ref_cv')->placeholder('--Upload CV--')->enableDownload()
                    ->autofocus()
                    ->required(),
                ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('S.N'),
                Tables\Columns\TextColumn::make('referral_id')->searchable()->label('Referral Id'),//using observers
                Tables\Columns\TextColumn::make('post.title')->label('Post Title'),
                Tables\Columns\TextColumn::make('created_at')->label('Refferal Date')
                ->dateTime('M j, Y')
                ->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('Refferred By'),
                Tables\Columns\ImageColumn::make('ref_cv')->label('CV'),
            ])
            ->filters([
                Tables\Filters\Filter::make('Daily referrals')
                ->query(fn (Builder $query): Builder => $query->whereDay('created_at', '=', date('d'))), //Filter Used for daily Referrals
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReferrals::route('/'),
            'create' => Pages\CreateReferral::route('/create'),
            'edit' => Pages\EditReferral::route('/{record}/edit'),
        ];
    }    
}
