<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    /** @use HasFactory<\Database\Factories\ExchangeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'api_url',
        'is_active'
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }
}
