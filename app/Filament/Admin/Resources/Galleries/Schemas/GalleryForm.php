<?php

namespace App\Filament\Admin\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->label('File Foto')
                    ->image()
                    ->imageEditor()
                    ->directory('gallery-uploads')
                    ->columnSpanFull(),

                TextInput::make('caption')
                    ->label('Caption / Keterangan (Opsional)')
                    ->placeholder('Contoh: Kegiatan MPLS Hari Pertama')
                    ->maxLength(255)
                    ->columnSpanFull(),

                Hidden::make('user_id')
                    ->default(fn() => Auth::id())
                    ->required(),
            ]);
    }
}
