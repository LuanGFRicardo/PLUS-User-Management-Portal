<?php

namespace App\Filament\Resources\LogManagementResource\Pages;

use App\Filament\Resources\LogManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateLogManagement extends CreateRecord
{
    protected static string $resource = LogManagementResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl();
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $ip = request()->ip();

        $basePayload = [
            'compartmentId' => 'ocid1.tenancy.oc1.maisinteligencia.infrastructure',
            'name' => $data['name'] ?? '',
            'description' => $data['description'] ?? '',
            'ip' => $ip,
        ];

        $json = [];

        switch ($data['action']) {
            case 'create_user':
            case 'create_group':
                $json = [
                    'Método' => 'POST',
                    ...$basePayload,
                ];
                break;

            case 'create_policy':
                $json = [
                    'Método' => 'POST',
                    ...$basePayload,
                    'statements' => [
                        'Allow group web-platform-admins to manage all-resources in tenancy',
                    ],
                ];
                break;

            default:
                $json = [
                    'ip' => $ip,
                ];
        }

        $data['json'] = $json;
        $data['status'] = 'pending';
        $data['data_cadastro'] = now();
        $data['user_id'] = Auth::id();

        return $data;
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }
}
