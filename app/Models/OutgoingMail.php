<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingMail extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function getRouteKeyName(): string
    {
        return 'number';
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
