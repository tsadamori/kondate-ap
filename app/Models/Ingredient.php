<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    private $hidden = ['created_at', 'updated_at'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
