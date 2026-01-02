<?php

namespace App\Filament\Admin\Resources\DepartmentProfiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class DepartmentProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Data Jurusan')->tabs([
                    Tab::make('Profil & Sejarah')
                        ->icon('heroicon-m-building-library')
                        ->schema([
                            TextInput::make('title')
                                ->label('Judul Halaman')
                                ->required()
                                ->placeholder('Contoh: Sejarah PPLG'),

                            Textarea::make('subtitle')
                                ->label('Deskripsi Singkat')
                                ->rows(2),

                            FileUpload::make('image')
                                ->label('Foto Utama (Background)')
                                ->image()
                                ->directory('department'),

                            TextInput::make('badge_text')
                                ->label('Teks Badge')
                                ->placeholder('Contoh: Sejak 2010'),

                            RichEditor::make('content')
                                ->label('Isi Sejarah Lengkap')
                                ->columnSpanFull(),

                            Repeater::make('features')
                                ->label('Poin Keunggulan')
                                ->schema([
                                    TextInput::make('point')
                                        ->label('Keunggulan')
                                        ->placeholder('Contoh: Kurikulum Industri'),
                                ])
                                ->grid(2),
                        ]),

                    Tab::make('Visi & Misi')
                        ->icon('heroicon-m-eye')
                        ->schema([
                            Textarea::make('vision')
                                ->label('Visi')
                                ->rows(3)
                                ->columnSpanFull(),

                            Repeater::make('mision')
                                ->label('Daftar Misi')
                                ->schema([
                                    TextInput::make('mision')
                                        ->label('Butir Misi')
                                        ->placeholder('Masukan satu poin misi...'),
                                ]),
                        ]),

                    Tab::make('Struktur & Kontak')
                        ->icon('heroicon-m-phone')
                        ->schema([
                            FileUpload::make('structure_image')
                                ->label('Gambar Bagan Struktur')
                                ->image()
                                ->directory('department'),

                            Section::make('Informasi Kontak')
                                ->schema([
                                    Textarea::make('address')
                                        ->label('Alamat Sekolah'),

                                    TextInput::make('email')
                                        ->email()
                                        ->prefixIcon('heroicon-m-envelope'),

                                    TextInput::make('phone')
                                        ->label('WhatsApp Admin')
                                        ->numeric()
                                        ->prefix('+62')
                                        ->helperText('Masukan angka saja, contoh: 81234567890'),

                                    // KeyValue untuk Sosmed (Instagram => URL)
                                    KeyValue::make('social_media')
                                        ->label('Social Media')
                                        ->keyLabel('Platform (IG/Youtube)')
                                        ->valueLabel('Link URL')
                                        ->addActionLabel('Tambah Sosmed'),

                                    Textarea::make('maps_embed')
                                        ->label('Google Maps Embed HTML')
                                        ->rows(3),
                                ]),
                        ]),
                ])->columnSpanFull()
            ]);
    }
}
