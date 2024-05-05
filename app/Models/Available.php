<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Available extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'note',
        'date',
        'status',
        'user_id',

    ];
    public function role(): BelongsTo
    {
        return $this->BelongsTo(Role::class);
    }
    public function service(): BelongsTo
    {
        return $this->BelongsTo(Service::class);
    }
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    public function appointment(): BelongsTo
    {
        return $this->BelongTo(Appointment::class);
    }
}
