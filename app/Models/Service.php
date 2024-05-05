<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Service extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'picture',
        'name',
        'price',
        'regular',
        'vertex',
        'flexible',
        'role_id',
        'category_id',
    ];
    protected $casts = [
        'role_id' => 'array',
    ];
    public function role(): BelongsTo
    {
        return $this->BelongsTo(Role::class);
    }
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }
    public function appointment(): HasMany
    {
        return $this->HasMany(Appointment::class);
    }
}
