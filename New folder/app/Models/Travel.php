<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    public const TRAVEL_STATUS_SELECT = [
        'progress'  => 'In progress',
        'cancelled' => 'cancelled',
        'arrived'   => 'Arrived',
    ];

    public $table = 'travel';

    protected $dates = [
        'arrival_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'travel',
        'travel_cost',
        'travel_destination_from',
        'travel_destnitation_to',
        'travel_destance',
        'arrival_time',
        'arrival_date',
        'client_id',
        'driver_id',
        'travel_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getArrivalDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setArrivalDateAttribute($value)
    {
        $this->attributes['arrival_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
