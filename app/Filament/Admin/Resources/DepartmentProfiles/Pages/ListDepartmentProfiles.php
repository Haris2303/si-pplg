<?php

namespace App\Filament\Admin\Resources\DepartmentProfiles\Pages;

use App\Filament\Admin\Resources\DepartmentProfiles\DepartmentProfileResource;
use App\Models\DepartmentProfile;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDepartmentProfiles extends ListRecords
{
    protected static string $resource = DepartmentProfileResource::class;

    public function mount(): void
    {
        $profile = DepartmentProfile::first();

        if ($profile) {
            $this->redirect(DepartmentProfileResource::getUrl('edit', ['record' => $profile]));
        } else {
            $this->redirect(DepartmentProfileResource::getUrl('create'));
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
