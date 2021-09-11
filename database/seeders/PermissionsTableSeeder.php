<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'car_create',
            ],
            [
                'id'    => 18,
                'title' => 'car_edit',
            ],
            [
                'id'    => 19,
                'title' => 'car_show',
            ],
            [
                'id'    => 20,
                'title' => 'car_delete',
            ],
            [
                'id'    => 21,
                'title' => 'car_access',
            ],
            [
                'id'    => 22,
                'title' => 'driver_create',
            ],
            [
                'id'    => 23,
                'title' => 'driver_edit',
            ],
            [
                'id'    => 24,
                'title' => 'driver_show',
            ],
            [
                'id'    => 25,
                'title' => 'driver_delete',
            ],
            [
                'id'    => 26,
                'title' => 'driver_access',
            ],
            [
                'id'    => 27,
                'title' => 'client_create',
            ],
            [
                'id'    => 28,
                'title' => 'client_edit',
            ],
            [
                'id'    => 29,
                'title' => 'client_show',
            ],
            [
                'id'    => 30,
                'title' => 'client_delete',
            ],
            [
                'id'    => 31,
                'title' => 'client_access',
            ],
            [
                'id'    => 32,
                'title' => 'travel_create',
            ],
            [
                'id'    => 33,
                'title' => 'travel_edit',
            ],
            [
                'id'    => 34,
                'title' => 'travel_show',
            ],
            [
                'id'    => 35,
                'title' => 'travel_delete',
            ],
            [
                'id'    => 36,
                'title' => 'travel_access',
            ],
            [
                'id'    => 37,
                'title' => 'rate_create',
            ],
            [
                'id'    => 38,
                'title' => 'rate_edit',
            ],
            [
                'id'    => 39,
                'title' => 'rate_show',
            ],
            [
                'id'    => 40,
                'title' => 'rate_delete',
            ],
            [
                'id'    => 41,
                'title' => 'rate_access',
            ],
            [
                'id'    => 42,
                'title' => 'setting_create',
            ],
            [
                'id'    => 43,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 44,
                'title' => 'setting_show',
            ],
            [
                'id'    => 45,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 46,
                'title' => 'setting_access',
            ],
            [
                'id'    => 47,
                'title' => 'complaint_create',
            ],
            [
                'id'    => 48,
                'title' => 'complaint_edit',
            ],
            [
                'id'    => 49,
                'title' => 'complaint_show',
            ],
            [
                'id'    => 50,
                'title' => 'complaint_delete',
            ],
            [
                'id'    => 51,
                'title' => 'complaint_access',
            ],
            [
                'id'    => 52,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 53,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 54,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 55,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 56,
                'title' => 'subscription_access',
            ],
            [
                'id'    => 57,
                'title' => 'subscriptiondriver_create',
            ],
            [
                'id'    => 58,
                'title' => 'subscriptiondriver_edit',
            ],
            [
                'id'    => 59,
                'title' => 'subscriptiondriver_show',
            ],
            [
                'id'    => 60,
                'title' => 'subscriptiondriver_delete',
            ],
            [
                'id'    => 61,
                'title' => 'subscriptiondriver_access',
            ],
            [
                'id'    => 62,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
