<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BdmpostResource\Pages;
use App\Models\Bdmpost;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;

class BdmpostResource extends Resource
{
    protected static ?string $model = Bdmpost::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Bench Sales';
    public static ?string $label = 'Sales Post';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Card::make()
                ->schema([

                Card::make()
                ->schema([
                    TextInput::make('bdm_role')->autofocus()->label('Role')->required(),
                ])->columns(1),
                Card::make()
                ->schema([
                    Textarea::make('bdm_jd')
                    ->label('Job Descriptions')
                    ->required()
                    ->maxLength(2000),
                ])->columns(1),
    //----------------------------------------------------------------//
                
                TextInput::make('visa_required')
                ->required()
                ->datalist([
                    'GC EAD',
                    'USC' ,
                    'EAD-OPT',
                    'TPS-EAD' ,
                    'OPT',
                    'GC',
                    'Green Card',
                    'H4EAD',
                    'CPT',
                    'H1B',
                    'Others',
                ]),
                TextInput::make('bdm_postion')
                       ->required()->label('Layer Position')
                        ->datalist([
                            'C2C',
                            'C2H',
                            'W2',
                            'Referral',
                        ]),
//----------------------------------------------------------------//
                Card::make()
                ->schema([
                    Select::make('bdm_state')
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
                    ->required()
                    ->label('State'),
                    TextInput::make('bdm_city')->required()->autofocus()->label('City')
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
                    TextInput::make('pv_name')->label('Prime Vendor')->autofocus()->placeholder('---Prime vendor Name---'),
                    TextInput::make('pv_email')->label('Email')->email()->autofocus()->different('email')->placeholder('---Prime vendor Email---'),
                    TextInput::make('pv_contact')->label('Contact')->placeholder('---Prime vendor Contact---')
                    ->maxLength('12')
                    ->autofocus()
                    ->tel()
                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                ])->columns(3),
    //----------------------------------------------------------------//
        //----------------------------------------------------------------//
        Card::make()
        ->schema([
            TextInput::make('layer_name')->label('Layer')->autofocus()->placeholder('---Layer Name---'),
            TextInput::make('layer_email')->label('Email')->email()->autofocus()->different('email')->placeholder('---Layer Email---'),
            TextInput::make('layer_contact')->label('Contact')->placeholder('---Layer Contact---')
            ->maxLength('12')
            ->autofocus()
            ->tel()
            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
            TextInput::make('layer_recruiter')->label('Layer Recruiter')->placeholder('---Layer Recruiter---')
            ->autofocus(),
        ])->columns(4),
//----------------------------------------------------------------//
                TextInput::make('max_rate')->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '$', thousandsSeparator: ',', decimalPlaces: 2, isSigned: false))->required()->label('Max Rate')->autofocus(),
                Select::make('bdm_status')
                            ->label('Status')
                            ->required()->autofocus()
                            ->options([
                                'Hiring' => 'Hiring',
                                'Active' => 'Active',
                                'Full' => 'Full',
                                'Hold' => 'Hold',
                                'Submitted' => 'Submitted',
                            ]),
                TextInput::make('bdm_client')->autofocus()->label('Client')->required(),
                Select::make('bdm_submission')->required()->autofocus()
                    ->options([
                        'Active' => 'Active',
                        'Hold' => 'Hold',
                    ])
                    ->label('Layer Submission'),
                ])->columns(2)
                
             ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('S.N'),
                Tables\Columns\TextColumn::make('bdmpost_id')->searchable()->label('Id'),//using observers
                Tables\Columns\TextColumn::make('created_at')->label('Date Posted')
                ->dateTime('M j, Y')
                ->sortable(),
                Tables\Columns\TextColumn::make('bdm_role')->label('Role'),
                Tables\Columns\TextColumn::make('visa_required')->searchable()->label('Visa Required'),//using observers
                Tables\Columns\TextColumn::make('bdm_postion')->label('BDM Postion'),
                Tables\Columns\TextColumn::make('bdm_state')->label('State'),
                Tables\Columns\TextColumn::make('bdm_city')->label('City'),
                Tables\Columns\TextColumn::make('max_rate')->label('Max rate')->prefix('$')->suffix('/hr')->searchable(),
                Tables\Columns\TextColumn::make('pv_name')->label('Prime Vendor')->searchable(),
                Tables\Columns\TextColumn::make('bdm_status')->label('Status')->searchable(),
                Tables\Columns\TextColumn::make('bdm_client')->label('Client')->searchable(),
                Tables\Columns\TextColumn::make('maxrate')->label('Rate')->prefix('$')->suffix('/hr')->hidden(),
                Tables\Columns\TextColumn::make('bdm_submission')->label('Submission')->searchable(),
                Tables\Columns\TextColumn::make('dbm_current_user_name')->label('Posted By'),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated At')
                ->dateTime('M j, Y')
                ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('Daily BDM Posts')
                ->query(fn (Builder $query): Builder => $query->whereDay('created_at', '=', date('d'))),
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
            'index' => Pages\ListBdmposts::route('/'),
            'create' => Pages\CreateBdmpost::route('/create'),
            'edit' => Pages\EditBdmpost::route('/{record}/edit'),
        ];
    }    
}
