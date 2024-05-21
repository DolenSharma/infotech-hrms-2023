<?php

namespace App\Filament\Resources\PostResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class UploadownprofilesRelationManager extends RelationManager
{
    protected static string $relationship = 'uploadownprofiles';

    protected static ?string $recordTitleAttribute = 'own_prof_name';
    public static ?string $label = 'Uploaded Profile';//Creating custom Profile Display min Dashboard for Uploadownprofile.

    public static function form(Form $form): Form
    {
        return $form
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
                ->maxLength(255),
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
                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
            Forms\Components\Select::make('state')
                ->required()
                ->searchable()
                ->options([
                    'Alabama',
                    'Alaska',
                    'Arizona',
                    'Arkansas',
                    'California',
                    'Colorado',
                    'Connecticut',
                    'Delaware',
                    'Florida',
                    'Georgia',
                    'Hawaii',
                    'Idaho',
                    'Illinois',
                    'Indiana',
                    'Iowa',
                    'Kansas',
                    'Kentucky',
                    'Louisiana',
                    'Maine',
                    'Maryland',
                    'Massachusetts',
                    'Michigan',
                    'Minnesota',
                    'Mississipi',
                    'Montana',
                    'Nebraska',
                    'Nevada',
                    'New Hampshire',
                    'New Jersey',
                    'New Mexico',
                    'New York',
                    'North Carolina',
                    'North Dakota',
                    'Ohio',
                    'Oklahoma',
                    'Oregon',
                    'Pennsylvania',
                    'Rhode Island',
                    'South Carolina',
                    'Tennessee',
                    'Texas',
                    'Utah',
                    'Vermont',
                    'Virginia',
                    'Washinton',
                    'West Virginia',
                    'Wisconsin',
                    'Wyoming',
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
                    'GC EAD',
                    'USC',
                    'EAD-OPT',
                    'TPS-EAD',
                    'OPT',
                    'GC',
                    'Green Card',
                    'Others',
                ]),
            Forms\Components\FileUpload::make('photo')
                ->autofocus()
                ->required()
                ->image()
                ->enableDownload()
                ->imagePreviewHeight('250'),
            Forms\Components\FileUpload::make('driving_license')
                ->autofocus()
                ->required()
                ->label('Driving License')
                ->enableDownload(),
                
            Forms\Components\FileUpload::make('uploaded_cv')
               ->enableDownload()
               ->label('Your CV')
               ->autofocus()
               ->required(),
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
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
