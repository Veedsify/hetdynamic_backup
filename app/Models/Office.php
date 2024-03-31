<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'city',
        'state',
        'zip',
        'phone',
        'email',
        'fax'
    ];

    public function openHours()
    {
        return $this->hasMany(OpenHour::class);
    }
}
