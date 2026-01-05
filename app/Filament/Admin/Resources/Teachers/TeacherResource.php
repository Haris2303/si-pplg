<?php

namespace App\Filament\Admin\Resources\Teachers;

use App\Filament\Admin\Resources\Teachers\Pages\CreateTeacher;
use App\Filament\Admin\Resources\Teachers\Pages\EditTeacher;
use App\Filament\Admin\Resources\Teachers\Pages\ListTeachers;
use App\Filament\Admin\Resources\Teachers\Schemas\TeacherForm;
use App\Filament\Admin\Resources\Teachers\Tables\TeachersTable;
use App\Models\Teacher;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::AcademicCap;

    protected static string|UnitEnum|null $navigationGroup = 'Data Master';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return TeacherForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TeachersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTeachers::route('/'),
            'create' => CreateTeacher::route('/create'),
            'edit' => EditTeacher::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        // Logika: Cuma boleh dilihat kalau role-nya ADMIN
        return auth()->user()->role === 'admin';
    }
}
