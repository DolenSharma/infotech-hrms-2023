<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UploadownprofileResource\Pages;
use App\Models\Uploadownprofile;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;

class UploadownprofileResource extends Resource
{
    protected static ?string $model = Uploadownprofile::class;

    protected static ?string $navigationIcon = 'heroicon-s-user';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'For Our Partners';
    
    public static ?string $label = 'Upload Own Profile';//Creating custom Profile Display min Dashboard for Uploadownprofile.

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Forms\Components\Select::make('post_id')
                    ->label('Post Name')
                    ->relationship('post', 'title')->preload()
                    ->autofocus()
                    ->required(),
                Forms\Components\TextInput::make('own_prof_name')
                    ->label('Name')
                    ->autofocus()
                    ->required()
                    ->maxLength(255)
                    ->placeholder('----Full Name----'),
                Forms\Components\TextInput::make('email_id')
                    ->label('Email')
                    ->unique(ignoreRecord:true)
                    ->placeholder('example@example.com')
                    ->email()
                    ->autofocus()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_number')
                    ->autofocus()
                    ->required()
                    ->maxLength(12)
                    ->autofocus()
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                    ->placeholder('----Contact No.----'),
                Forms\Components\Select::make('state')
                    ->required()
                    ->searchable()
                    ->options([
                        'Alabama' =>'Alabama',
                        'Alaska' =>'Alaska',
                        'Arizona' =>'Arizona',
                        'Arkansas' =>'Arkansas',
                        'California'=>'California',
                        'Colorado' =>'Colorado',
                        'Connecticut'=>'Connecticut',
                        'Delaware'=>'Delaware',
                        'Florida'=>'Florida',
                        'Georgia'  =>'Georgia',
                        'Hawaii' =>'Hawaii',
                        'Idaho' =>'Idaho',
                        'Illinois' =>'Illinois',
                        'Indiana'=>'Indiana',
                        'Iowa'=> 'Iowa',
                        'Kansas' =>'Kansas',
                        'Kentucky'=>'Kentucky',
                        'Louisiana' => 'Louisiana',
                        'Maine' =>'Maine',
                        'Maryland'=>'Maryland',
                        'Massachusetts' =>'Massachusetts',
                        'Michigan' =>'Michigan',
                        'Minnesota'=>'Minnesota',
                        'Mississipi'=>'Mississipi',
                        'Montana'=>'Montana',
                        'Nebraska'=>'Nebraska',
                        'Nevada'=>'Nevada',
                        'New Hampshire'=>'New Hampshire',
                        'New Jersey'=>'New Jersey',
                        'New Mexico'=>'New Mexico',
                        'New York'=>'New York',
                        'North Carolina'=>'North Carolina',
                        'North Dakota'=>'North Dakota',
                        'Ohio' =>'Ohio',
                        'Oklahoma'  =>'Oklahoma',
                        'Oregon'=>'Oregon',
                        'Pennsylvania' => 'Pennsylvania',
                        'Rhode Island'=>'Rhode Island',
                        'South Carolina'=>'South Carolina',
                        'Tennessee'=>'Tennessee',
                        'Texas'=>'Texas',
                        'Utah'=>'Utah',
                        'Vermont'=>'Vermont',
                        'Virginia' =>'Virginia',
                        'Washinton'=>'Washinton',
                        'West Virginia' =>'West Virginia',
                        'Wisconsin'=>'Wisconsin',
                        'Wyoming'=>'Wyoming',
                    ])
                    ->helperText('Select a state!'),
                Forms\Components\TextInput::make('city')
                ->helperText('Please mention city here.')
                    ->autofocus()
                    ->required()
                    ->maxLength(255),
            Forms\Components\Select::make('visa_status')
                    ->autofocus()
                    ->required()
                    ->options([
                    'GC EAD' =>'GC EAD',
                    'USC' =>'USC',
                    'EAD-OPT' =>'EAD-OPT',
                    'TPS-EAD'  =>'TPS-EAD',
                    'OPT'=>'OPT',
                    'GC' =>'GC',
                    'Green Card'=> 'Green Card',
                    'H4EAD'=> 'H4EAD',
                    'CPT'=> 'CPT',
                    'H1B'=> 'H1B',
                    'Others'  =>'Others',
                    ]),
                Forms\Components\FileUpload::make('photo')
                    ->directory('ownprofile-photos')
                    ->autofocus()
                    ->required()
                    ->image()
                    ->enableDownload()
                    ->imagePreviewHeight('250'),
                Forms\Components\FileUpload::make('driving_license')
                    ->directory('ownprofile-drivinglicense')
                    ->autofocus()
                    ->required()
                    ->label('Driving License')
                    ->enableDownload(),
                    
                Forms\Components\FileUpload::make('uploaded_cv')
                   ->directory('ownprofile-attachments')
                   ->enableDownload()
                   ->label('Your CV')
                   ->autofocus()
                   ->required(),
                ])->columns(5)
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.id')->label('User ID'),
                Tables\Columns\TextColumn::make('uploadownprofile_id')->searchable()->label('Profile Id'), //using observer
                Tables\Columns\TextColumn::make('post.title')->label('POST'),
                Tables\Columns\TextColumn::make('own_prof_name')->label('Name'),
                // Tables\Columns\TextColumn::make('user.name')->label('Name'),// using observer
                Tables\Columns\TextColumn::make('email_id')->label('email'),
                Tables\Columns\TextColumn::make('contact_number'),
                Tables\Columns\TextColumn::make('state'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('visa_status'),
                Tables\Columns\ImageColumn::make('photo'),
                Tables\Columns\ImageColumn::make('driving_license'),
                Tables\Columns\ImageColumn::make('uploaded_cv'),
            ])
            ->filters([
                Tables\Filters\Filter::make('Daily UOP')
                ->query(fn (Builder $query): Builder => $query->whereDay('created_at', '=', date('d'))), //Filter Used for daily UOP
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListUploadownprofiles::route('/'),
            'create' => Pages\CreateUploadownprofile::route('/create'),
            'edit' => Pages\EditUploadownprofile::route('/{record}/edit'),
        ];
    }    
}
