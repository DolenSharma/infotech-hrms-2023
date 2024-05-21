<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LayerResource\Pages;
use App\Filament\Resources\LayerResource\RelationManagers;
use App\Models\Layer;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use App\Models\Consultant;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;

class LayerResource extends Resource
{
    protected static ?string $model = Layer::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    public static ?string $label = 'Sales Submission';//Creating custom Profile Display min Dashboard for LS.
    public static $name = 'Layer';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Bench Sales';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
        ->schema([
            Card::make()
            ->schema([
            Select::make('bdmpost_id')
               ->relationship('bdmpost', 'bdmpost_id')->preload()
                ->label('Role'),
            Select::make('candidate_name')
                ->label('Candidate')->required()
                ->relationship('consultant', 'consultant_name')->preload()
                ->searchable(),
            ])->columns(2),

            Card::make()
            ->schema([
                TextInput::make('layer_rate')
                ->label('Rate')
                ->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '$', thousandsSeparator: ',', decimalPlaces: 2, isSigned: false))->required(),
            Select::make('layer_basis')
                ->label('Basis')
                ->options([
                    'C2C' =>'C2C',
                    'W2' =>'W2',
                    'Referral' =>'Referral',
                ]),
            ])->columns(2),
        ])
    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('layer_id')->sortable()->searchable()->label('Layer ID'),
            TextColumn::make('interviews.status')->label('Interview Status')->color('success'),
            TextColumn::make('bdmpost.layer_name')->sortable()->searchable()->label('Layer Name'),
            TextColumn::make('bdmpost.layer_recruiter')->sortable()->searchable()->label('Layer Recruiter'),
            TextColumn::make('bdmpost.bdm_jd')->sortable()->limit(50)->searchable()->label('JD'),
            TextColumn::make('layer_rate')->sortable()->prefix('$')->suffix('/hr')->searchable(),
            TextColumn::make('bdmpost.bdm_client')->label('Client')->searchable(),
            TextColumn::make('consultant.consultant_name')->sortable()->label('Candidate')->searchable(),
            TextColumn::make('layer_basis')->sortable()->searchable(),
            TextColumn::make('consultant.profile_given_by')->label('Profile Given By')->searchable(),
            TextColumn::make('created_at')->dateTime('M j, Y')->sortable()->searchable(),
        ])           
            ->filters([
                Tables\Filters\Filter::make('Daily submissions')
                ->query(fn (Builder $query): Builder => $query->whereDay('created_at', '=', date('d'))), //Filter Used for daily Submissions
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListLayers::route('/'),
            'create' => Pages\CreateLayer::route('/create'),
            'edit' => Pages\EditLayer::route('/{record}/edit'),
        ];
    }    
}
