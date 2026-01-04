<?php

namespace App\Filament\Admin\Resources\Subjects\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class SubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Detail Kategori')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Nama Kategori')
                                    ->placeholder('Contoh: Muatan Nasional (A)')
                                    ->required()
                                    ->maxLength(255),

                                Textarea::make('description')
                                    ->label('Deskripsi Singkat')
                                    ->rows(3)
                                    ->required()
                                    ->columnSpanFull(),

                                ColorPicker::make('color')
                                    ->label('Warna Card')
                                    ->required(),
                            ])
                    ])->columnSpan(2),

                Group::make()
                    ->schema([
                        Section::make('Ikon Visual')
                            ->schema([
                                FileUpload::make('icon')
                                    ->label('Ikon Kategori')
                                    ->image()
                                    ->directory('subjects-icons')
                                    ->required(),

                                Hidden::make('user_id')
                                    ->default(fn() => Auth::id()),
                            ])
                    ])->columnSpan(1),

                Section::make('Daftar Mata Pelajaran')
                    ->description('Tambahkan mata pelajaran yang masuk dalam kategori ini.')
                    ->schema([
                        Repeater::make('subjects')
                            ->label('List Mapel')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Mata Pelajaran')
                                    ->placeholder('Matematika, Bahasa Indonesia, dll.')
                                    ->required()
                                    ->maxLength(255)
                            ])
                            ->addActionLabel('Tambah Mapel')
                            ->grid(2)
                            ->columnSpanFull()
                    ])->columnSpan(2)

            ])->columns(3);
    }
}
