<?php

namespace App\Filament\Resources\PostResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class ReferralsRelationManager extends RelationManager
{
    protected static string $relationship = 'referrals';

    protected static ?string $recordTitleAttribute = 'referral_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
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
                    Forms\Components\FileUpload::make('ref_cv')->placeholder('--Upload CV--')
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
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
