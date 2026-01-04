<?php

namespace App\Filament\Admin\Resources\Articles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Konten Utama')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul Artikel')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Set $set, $state) {
                                        $set('slug', Str::slug($state));
                                    }),

                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->dehydrated()
                                    ->unique(ignoreRecord: true)
                                    ->helperText('Otomatis terisi sesuai judul artikel.'),

                                Select::make('category_id')
                                    ->label('Kategori')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload(),

                                RichEditor::make('content')
                                    ->label('Isi Artikel')
                                    ->fileAttachmentsDirectory('articles/content')
                                    ->columnSpanFull()
                            ])
                    ])->columnSpan(2),

                Group::make()
                    ->schema([
                        Section::make('Meta Data')
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->directory('articles/thumbnails')
                                    ->required(),

                                Toggle::make('is_published')
                                    ->label('Terbitkan?')
                                    ->default(true)
                                    ->helperText('Jika mati, artikel tidak akan muncul di web.'),

                                Hidden::make('user_id')
                                    ->default(fn() => Auth::id())
                                    ->dehydrated()
                            ])
                    ])->columnSpan(1)
            ])->columns(3);
    }
}
