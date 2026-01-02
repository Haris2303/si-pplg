<?php

namespace App\Filament\Admin\Resources\DepartmentProfiles\Pages;

use App\Filament\Admin\Resources\DepartmentProfiles\DepartmentProfileResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDepartmentProfiles extends ListRecords
{
    protected static string $resource = DepartmentProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
