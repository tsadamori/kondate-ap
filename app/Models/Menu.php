<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'related_link',
        'description'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'menu_category_relationships');
    }

    public function menuList(): BelongsTo
    {
        return $this->belongsTo(MenuList::class);
    }

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
