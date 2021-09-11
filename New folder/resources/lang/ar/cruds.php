<?php

return [
    'userManagement' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
            'phone'                    => 'Phone',
            'phone_helper'             => ' ',
        ],
    ],
    'car' => [
        'title'          => 'Cars',
        'title_singular' => 'Car',
        'fields'         => [
            'id'                                 => 'ID',
            'id_helper'                          => ' ',
            'carname'                            => 'Car name',
            'carname_helper'                     => ' ',
            'identity_num'                       => 'Identification Number',
            'identity_num_helper'                => ' ',
            'identification_number_photo'        => 'Identification Number photo',
            'identification_number_photo_helper' => ' ',
            'license_number'                     => 'License Number',
            'license_number_helper'              => ' ',
            'license_number_photo'               => 'License Number Photo',
            'license_number_photo_helper'        => ' ',
            'insurance_policy_number'            => 'Insurance Policy Number',
            'insurance_policy_number_helper'     => ' ',
            'photo'                              => 'Photo',
            'photo_helper'                       => ' ',
            'city'                               => 'City',
            'city_helper'                        => ' ',
            'created_at'                         => 'Created at',
            'created_at_helper'                  => ' ',
            'updated_at'                         => 'Updated at',
            'updated_at_helper'                  => ' ',
            'deleted_at'                         => 'Deleted at',
            'deleted_at_helper'                  => ' ',
        ],
    ],
    'driver' => [
        'title'          => 'Drivers',
        'title_singular' => 'Driver',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'password'          => 'Password',
            'password_helper'   => ' ',
            'delete'            => 'Delete account',
            'delete_helper'     => ' ',
            'confirm'           => 'Confirm delete',
            'confirm_helper'    => ' ',
            'wallet'            => 'Wallet',
            'wallet_helper'     => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
        ],
    ],
    'client' => [
        'title'          => 'Client',
        'title_singular' => 'Client',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'email'             => 'email',
            'email_helper'      => ' ',
            'password'          => 'Password',
            'password_helper'   => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'travel' => [
        'title'          => 'Travels',
        'title_singular' => 'Travel',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => ' ',
            'travel'                         => 'Travel ID',
            'travel_helper'                  => ' ',
            'travel_cost'                    => 'Travel Cost',
            'travel_cost_helper'             => ' ',
            'travel_destination_from'        => 'Travel Destination From',
            'travel_destination_from_helper' => ' ',
            'travel_destnitation_to'         => 'Travel Destnitation To',
            'travel_destnitation_to_helper'  => ' ',
            'created_at'                     => 'Created at',
            'created_at_helper'              => ' ',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => ' ',
            'travel_destance'                => 'Travel Destance',
            'travel_destance_helper'         => ' ',
            'arrival_time'                   => 'Arrival Time',
            'arrival_time_helper'            => ' ',
            'arrival_date'                   => 'Arrival Date',
            'arrival_date_helper'            => ' ',
            'client'                         => 'Client',
            'client_helper'                  => ' ',
            'driver'                         => 'Driver',
            'driver_helper'                  => ' ',
            'travel_status'                  => 'Travel Status',
            'travel_status_helper'           => ' ',
        ],
    ],
    'rate' => [
        'title'          => 'Rate',
        'title_singular' => 'Rate',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'travel'            => 'Travel ID',
            'travel_helper'     => ' ',
            'rate'              => 'Rate',
            'rate_helper'       => ' ',
            'client'            => 'Client',
            'client_helper'     => ' ',
            'feedback'          => 'Feedback',
            'feedback_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'App Settings',
        'title_singular' => 'App Setting',
        'fields'         => [
            'id'                            => 'ID',
            'id_helper'                     => ' ',
            'draw_on_every_travel_a'        => 'Draw On Every Travel (Amount)',
            'draw_on_every_travel_a_helper' => ' ',
            'draw_on_every_travel_p'        => 'Draw On Every Travel P',
            'draw_on_every_travel_p_helper' => ' ',
            'type'                          => 'Type',
            'type_helper'                   => ' ',
            'created_at'                    => 'Created at',
            'created_at_helper'             => ' ',
            'updated_at'                    => 'Updated at',
            'updated_at_helper'             => ' ',
            'deleted_at'                    => 'Deleted at',
            'deleted_at_helper'             => ' ',
        ],
    ],
    'complaint' => [
        'title'          => 'Complaints',
        'title_singular' => 'Complaint',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'complaints'        => 'Complaints',
            'complaints_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'client'            => 'Client',
            'client_helper'     => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'trip'              => 'Trip',
            'trip_helper'       => ' ',
        ],
    ],
    'subscription' => [
        'title'          => 'Subscription',
        'title_singular' => 'Subscription',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'amount'            => 'Amount',
            'amount_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'subscriptiondriver' => [
        'title'          => 'Driver Subscriptions',
        'title_singular' => 'Driver Subscription',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'driver'                   => 'Driver',
            'driver_helper'            => ' ',
            'subscription'             => 'Subscription',
            'subscription_helper'      => ' ',
            'subscription_date'        => 'Subscription Date',
            'subscription_date_helper' => ' ',
            'expiration_date'          => 'Expiration Date',
            'expiration_date_helper'   => ' ',
            'status'                   => 'Status',
            'status_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
];
