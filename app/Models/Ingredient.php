<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'name',
        'quantity'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
