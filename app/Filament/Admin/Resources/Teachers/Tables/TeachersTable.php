<?php

namespace App\Filament\Admin\Resources\Teachers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class TeachersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->circular(),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('subject')
                    ->searchable()
                    ->badge() // Biar tampilannya kayak badge warna
                    ->color('info'),

                ToggleColumn::make('is_active')
                    ->label('Aktif'),

                TextColumn::make('social_media')
                    ->label('Sosmed')
                    ->getStateUsing(function ($record) {
                        $data = $record->social_media;

                        // Jaga-jaga kalau masih string, decode dulu
                        if (is_string($data)) {
                            $data = json_decode($data, true);
                        }

                        // Pastikan array, lalu hitung
                        $count = count((array)$data);

                        return $count . ' Akun';
                    })
                    ->badge()
                    ->color(fn($state) => $state === '0 Akun' ? 'gray' : 'info'),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Status Keaktifan'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
