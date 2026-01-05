<?php

namespace App\Filament\Admin\Resources\DepartmentProfiles;

use App\Filament\Admin\Resources\DepartmentProfiles\Pages\CreateDepartmentProfile;
use App\Filament\Admin\Resources\DepartmentProfiles\Pages\EditDepartmentProfile;
use App\Filament\Admin\Resources\DepartmentProfiles\Pages\ListDepartmentProfiles;
use App\Filament\Admin\Resources\DepartmentProfiles\Schemas\DepartmentProfileForm;
use App\Filament\Admin\Resources\DepartmentProfiles\Tables\DepartmentProfilesTable;
use App\Models\DepartmentProfile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

class DepartmentProfileResource extends Resource
{
    protected static ?string $model = DepartmentProfile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingLibrary;

    protected static string|UnitEnum|null $navigationGroup = 'Publikasi';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return DepartmentProfileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DepartmentProfilesTable::configure($table);
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
            'index' => ListDepartmentProfiles::route('/'),
            'create' => CreateDepartmentProfile::route('/create'),
            'edit' => EditDepartmentProfile::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        // Logika: Cuma boleh dilihat kalau role-nya ADMIN
        return auth()->user()->role === 'admin';
    }

    public static function canCreate(): bool
    {
        return DepartmentProfile::count() === 0;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}
