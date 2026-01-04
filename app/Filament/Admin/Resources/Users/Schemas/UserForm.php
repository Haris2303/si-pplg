<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Akun')
                    ->schema([
                        // NAMA
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        // EMAIL
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        // ROLE (PENTING: Sesuai Migration Abang)
                        Select::make('role')
                            ->label('Hak Akses (Role)')
                            ->options([
                                'admin' => 'Administrator',
                                'teacher' => 'Guru / Staff',
                            ])
                            ->required()
                            ->default('teacher'), // Default teacher sesuai migration

                        // PASSWORD
                        TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->dehydrateStateUsing(fn($state) => Hash::make($state))
                            ->dehydrated(fn($state) => filled($state))
                            ->required(fn(string $context): bool => $context === 'create')
                            ->label('Password')
                            ->helperText(fn(string $context) => $context === 'edit' ? 'Kosongkan jika tidak ingin mengganti password.' : null),

                        TextInput::make('password_confirmation')
                            ->label('Ulangi Password')
                            ->password()
                            ->revealable()
                            // Wajib diisi JIKA context=create ATAU password utama diisi
                            ->required(fn(string $context, Get $get) => $context === 'create' || filled($get('password')))
                            // Validasi: Harus sama dengan field 'password'
                            ->same('password')
                            ->dehydrated(false),
                    ])->columns(1),
            ]);
    }
}
