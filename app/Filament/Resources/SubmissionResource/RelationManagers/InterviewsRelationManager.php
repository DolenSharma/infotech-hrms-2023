<?php

namespace App\Filament\Resources\SubmissionResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class InterviewsRelationManager extends RelationManager
{
    protected static string $relationship = 'interviews';

    protected static ?string $recordTitleAttribute = 'interview_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('interview_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('interview_id')->searchable()->label('Interview ID'),
                Tables\Columns\TextColumn::make('submission.submission_id')->searchable()->label('SUB ID'),
                Tables\Columns\TextColumn::make('status')->searchable()->label('Staus'),
                Tables\Columns\TextColumn::make('rounds_of_interview')->searchable()->label('Round'),
                Tables\Columns\TextColumn::make('submission.rate')->label('Sub Rate')->prefix('$')->suffix('/hr'),
                Tables\Columns\TextColumn::make('interview_date')->label('Interview Date & Time')->color('warning'),
                Tables\Columns\TextColumn::make('submission.consultant.profile_given_by')->label('Profile Given By'),
            ]);
    }    
}
