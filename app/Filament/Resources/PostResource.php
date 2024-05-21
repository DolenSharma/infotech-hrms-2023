<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-s-newspaper';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Recruitement';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Card::make()
                ->schema([
                    Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Job Title')
                    ->placeholder('Please select a title')
                    ->maxLength(255),
                Forms\Components\Textarea::make('content')
                     ->label('Job Descriptions')
                     ->required()
                     ->maxLength(2000),
                    ])->columns(1),
                
    //----------------------------------------------------------------//
                 Forms\Components\Card::make()
                        ->schema([
                  Forms\Components\Select::make('post_state')
                  ->label('State')
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
                ->helperText('Please select a state!')
                ->required(),
                Forms\Components\TextInput::make('post_city')
                ->required()
                ->autofocus()
                ->label('City Name')
            ])->columns(2),
            Card::make()
            ->schema([
                TextInput::make('implementation')
                        ->placeholder('---Implementation Name---')
                        ->label('Implementation Name')
                        ->autofocus()
                        ->minLength(2)
                        ->maxLength(255),
                TextInput::make('imp_email')
                            ->different('email')
                            ->label('Email')
                            ->placeholder('---Implementation Email---')
                            ->email()
                            ->autofocus(),
                TextInput::make('imp_contact')
                ->placeholder('---Implementation Contact---')
                            ->label('Contact')
                            ->maxLength('12')
                            ->autofocus()
                            ->tel()
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
            ])->columns(3),
//----------------------------------------------------------------//

//----------------------------------------------------------------//
            Card::make()
            ->schema([
                TextInput::make('prime_vender')->label('Prime Vendor')->autofocus()->placeholder('---Prime vendor Name---'),
                TextInput::make('pv_email')->label('Email')->email()->autofocus()->different('email')->placeholder('---Prime vendor Email---'),
                TextInput::make('pv_contact')->label('Contact')->placeholder('---Prime vendor Contact---')
                ->maxLength('12')
                ->autofocus()
                ->tel()
                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
            ])->columns(3),
            Card::make()
            ->schema([
                TextInput::make('end_client')
                ->placeholder('---End Client Name---')
                        ->autofocus()
                        ->minLength(2)
                        ->maxLength(255)
                        ->required(),
                TextInput::make('rate')->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '$', thousandsSeparator: ',', decimalPlaces: 2, isSigned: false))->required(),
                TextInput::make('prime_rate')->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '$', thousandsSeparator: ',', decimalPlaces: 2, isSigned: false))->required(),
            ])->columns(3),
                Forms\Components\Select::make('status')
                        ->required()
                        ->options([
                            'Active' => 'Active',
                            'Inactive' => 'Inactive',
                            'Hold' => 'Holding',
                            'Filled' => 'Filled',
                            'Submitted' => 'Submitted',
                        ])
                ])->columns(1)
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
        
            ->columns([
                Tables\Columns\TextColumn::make('post_id')->searchable()->label('Job Id'),//using observers
                Tables\Columns\TextColumn::make('title')->searchable()->label('Job Title'),//using observers
                Tables\Columns\TextColumn::make('content')->limit(50)->label('Job Descriptions')->searchable(),
                Tables\Columns\TextColumn::make('status')->limit(50)->label('Status')->searchable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('Daily Posts')
                ->query(fn (Builder $query): Builder => $query->whereDay('created_at', '=', date('d'))), //Filter Used for daily Posts
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
            RelationManagers\ReferralsRelationManager::class,
            RelationManagers\UploadownprofilesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
    

    
}
