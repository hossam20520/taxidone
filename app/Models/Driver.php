<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public const DELETE_SELECT = [
        'no'  => 'No',
        'yes' => 'Yes',
    ];

    public const CONFIRM_SELECT = [
        'no'  => 'No',
        'yes' => 'Yes',
    ];

    public $table = 'drivers';

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'wallet',
        'name',
        'email',
        'phone',
        'password',
        'delete',
        'confirm',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
