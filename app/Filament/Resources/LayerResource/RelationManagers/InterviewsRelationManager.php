<?php

namespace App\Filament\Resources\LayerResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InterviewsRelationManager extends RelationManager
{
    protected static string $relationship = 'interviews';

    protected static ?string $recordTitleAttribute = 'interview_id';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('interview_id')->searchable()->label('Interview ID'),
                Tables\Columns\TextColumn::make('layer.layer_id')->searchable()->label('Layer ID'),
                Tables\Columns\TextColumn::make('status')->searchable()->label('Staus'),
                Tables\Columns\TextColumn::make('rounds_of_interview')->searchable()->label('Round'),
                Tables\Columns\TextColumn::make('layer.layer_rate')->label('Layer Rate')->prefix('$')->suffix('/hr'),
                Tables\Columns\TextColumn::make('interview_date')->label('Interview Date & Time')->color('warning'),
                Tables\Columns\TextColumn::make('layer.consultant.profile_given_by')->label('Profile Given By'),
            ])
            ->filters([
                //
            ]);
    }    
}
