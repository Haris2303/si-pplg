<?php

namespace App\Filament\Admin\Resources\DepartmentProfiles\Pages;

use App\Filament\Admin\Resources\DepartmentProfiles\DepartmentProfileResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDepartmentProfile extends EditRecord
{
    protected static string $resource = DepartmentProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
