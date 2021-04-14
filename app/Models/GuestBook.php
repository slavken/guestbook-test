<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'message'
    ];

    public function scopeActive($query)
    {
        $query->where('status', true);
    }

    public function scopeInActive($query)
    {
        $query->where('status', false);
    }
}
