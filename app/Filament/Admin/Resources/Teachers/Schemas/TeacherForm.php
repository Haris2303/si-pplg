<?php

namespace App\Filament\Admin\Resources\Teachers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Informasi Pribadi')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Foto Profil')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('teacher-uploads')
                                    ->columnSpanFull(),

                                TextInput::make('name')
                                    ->label('Nama Lengkap')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('subject')
                                    ->label('Mata Pelajaran / Jabatan')
                                    ->placeholder('Contoh: Produktif RPL, Kaprodi')
                                    ->required()
                                    ->maxLength(255),

                                Toggle::make('is_active')
                                    ->label('Status Aktif')
                                    ->default(true)
                                    ->helperText('Jika dimatikan, guru tidak akan muncul di website.'),
                            ]),

                    ])->columnSpan(2),

                Group::make()
                    ->schema([
                        Section::make('Sosial Media')
                            ->schema([
                                KeyValue::make('social_media')
                                    ->label('Akun Sosmed')
                                    ->keyLabel('Platform (Instagram, LinkedIn, dll)')
                                    ->valueLabel('Link URL')
                                    ->addActionLabel('Tambah Sosmed')
                                    ->reorderable(),
                            ]),
                        Hidden::make('created_by')
                            ->default(fn() => Auth::id()),
                    ])->columnSpan(1),
            ])->columns(3);
    }
}
