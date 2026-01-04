<?php

namespace App\Filament\Admin\Resources\Subjects\Tables;

use App\Models\Subject;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class SubjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon')
                    ->label('Ikon')
                    ->square(),

                TextColumn::make('title')
                    ->label('Kategori')
                    ->searchable()
                    ->weight('bold')
                    ->limit(50)
                    ->description(fn(Subject $record) => Str::limit($record->description, 50)),

                ColorColumn::make('color')
                    ->label('Warna'),

                TextColumn::make('subjects')
                    ->label('Jumlah Mapel')
                    ->getStateUsing(fn($record) => count($record->subjects ?? []) . ' Mapel')
                    ->badge()
                    ->color('success'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
