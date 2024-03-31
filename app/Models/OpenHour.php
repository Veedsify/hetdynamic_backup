<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenHour extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'open',
        'office_id',
        'close'
    ];

    public function officeAddress()
    {
        return $this->belongsTo(Office::class);
    }
}
