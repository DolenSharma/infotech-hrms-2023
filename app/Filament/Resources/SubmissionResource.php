<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubmissionResource\Pages;
use App\Filament\Resources\SubmissionResource\RelationManagers;
use App\Models\Submission;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class SubmissionResource extends Resource
{

    protected static ?string $model = Submission::class;

    protected static ?string $navigationIcon = 'heroicon-s-document';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Recruitement';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
//
            Card::make()
            ->schema([

            Select::make('consultant_id')
                ->autofocus()
                ->required()
                ->reactive()
                ->relationship('consultant', 'consultant_name'),

            Select::make('job_title')->label('Job Title')
                        ->autofocus()
                        ->required()
                        ->reactive()
                        ->relationship('post', 'title'),
// //----------------------------------------------------------------//
//             Card::make()
//             ->schema([
//                 Select::make('state')
//                 ->searchable()
//                 ->options([
//                     'Alabama' =>'Alabama',
//                     'Alaska' =>'Alaska',
//                     'Arizona' =>'Arizona',
//                     'Arkansas' =>'Arkansas',
//                     'California'=>'California',
//                     'Colorado' =>'Colorado',
//                     'Connecticut'=>'Connecticut',
//                     'Delaware'=>'Delaware',
//                     'Florida'=>'Florida',
//                     'Georgia'  =>'Georgia',
//                     'Hawaii' =>'Hawaii',
//                     'Idaho' =>'Idaho',
//                     'Illinois' =>'Illinois',
//                     'Indiana'=>'Indiana',
//                     'Iowa'=> 'Iowa',
//                     'Kansas' =>'Kansas',
//                     'Kentucky'=>'Kentucky',
//                     'Louisiana' => 'Louisiana',
//                     'Maine' =>'Maine',
//                     'Maryland'=>'Maryland',
//                     'Massachusetts' =>'Massachusetts',
//                     'Michigan' =>'Michigan',
//                     'Minnesota'=>'Minnesota',
//                     'Mississipi'=>'Mississipi',
//                     'Montana'=>'Montana',
//                     'Nebraska'=>'Nebraska',
//                     'Nevada'=>'Nevada',
//                     'New Hampshire'=>'New Hampshire',
//                     'New Jersey'=>'New Jersey',
//                     'New Mexico'=>'New Mexico',
//                     'New York'=>'New York',
//                     'North Carolina'=>'North Carolina',
//                     'North Dakota'=>'North Dakota',
//                     'Ohio' =>'Ohio',
//                     'Oklahoma'  =>'Oklahoma',
//                     'Oregon'=>'Oregon',
//                     'Pennsylvania' => 'Pennsylvania',
//                     'Rhode Island'=>'Rhode Island',
//                     'South Carolina'=>'South Carolina',
//                     'Tennessee'=>'Tennessee',
//                     'Texas'=>'Texas',
//                     'Utah'=>'Utah',
//                     'Vermont'=>'Vermont',
//                     'Virginia' =>'Virginia',
//                     'Washinton'=>'Washinton',
//                     'West Virginia' =>'West Virginia',
//                     'Wisconsin'=>'Wisconsin',
//                     'Wyoming'=>'Wyoming',
//                 ])
//                 ->helperText('Please select a state!')
//                 ->required(),
//                 TextInput::make('city')->required()->autofocus()
//             ])->columns(2),
       
            TextInput::make('rate')->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '$', thousandsSeparator: ',', decimalPlaces: 2, isSigned: false))->required(),
            Select::make('sub_basis')
            ->label('Basis')
            ->options([
                'C2C' =>'C2C',
                'W2' =>'W2',
                'Referral' =>'Referral',
            ]),

            ])->columns(2),

        ]);
    }

    public static function table(Table $table): Table
    {
          return $table
            ->columns([
                // Tables\Columns\TextColumn::make('id')->label('S.N'),
                Tables\Columns\TextColumn::make('submission_id')->searchable()->label('Sub Id'),//using observers
                Tables\Columns\TextColumn::make('created_at')->label('Date Submitted')
                ->dateTime('M j, Y')
                ->sortable(),
                Tables\Columns\TextColumn::make('interviews.status')->label('Interview Status')->color('success'),
                Tables\Columns\TextColumn::make('post.title')->label('Job Title'),
                Tables\Columns\TextColumn::make('current_user_name')->searchable()->label('Submitted By'),//using observers
                Tables\Columns\TextColumn::make('consultant.consultant_name')->label('Consultant'),
                Tables\Columns\TextColumn::make('consultant.state')->label('State'),
                Tables\Columns\TextColumn::make('consultant.city')->label('City'),
                Tables\Columns\TextColumn::make('post.implementation')->label('Implementation Partner')->hidden(),
                Tables\Columns\TextColumn::make('post.prime_vender')->label('Prime Vendor')->hidden(),
                Tables\Columns\TextColumn::make('post.end_client')->label('End Client'),
                Tables\Columns\TextColumn::make('rate')->label('Rate')->prefix('$')->suffix('/hr')->hidden(),
                Tables\Columns\TextColumn::make('consultant.status')->label('Status'),
                Tables\Columns\TextColumn::make('post.status')->label('Post Status'),
                Tables\Columns\TextColumn::make('consultant.bench_rate')->label('Bench Rate')->prefix('$')->suffix('/hr'),
                Tables\Columns\TextColumn::make('consultant.profile_given_by')->label('Profile Given By')->searchable(),
                Tables\Columns\TextColumn::make('sub_basis')->label('Basis')->searchable(),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated At')
                ->dateTime('M j, Y')
                ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('Daily submissions')
                ->query(fn (Builder $query): Builder => $query->whereDay('created_at', '=', date('d'))), //Filter Used for daily Submissions
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
            RelationManagers\InterviewsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'Settings' => Pages\Settings::route('/profile'),//working on custume pages
            'index' => Pages\ListSubmissions::route('/'),
            'create' => Pages\CreateSubmission::route('/create'),
            'view' => Pages\ViewSubmission::route('/{record}'),
            'edit' => Pages\EditSubmission::route('/{record}/edit'),
        ];
    }

}
