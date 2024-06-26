<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Role extends Model
{
    use HasFactory;
    public function user(): HasMany
    {
        return $this->HasMany(User::class);
    }
    public function service(): HasMany
    {
        return $this->HasMany(Service::class);
    }
    public function appointment(): HasMany
    {
        return $this->HasMany(Appointment::class);
    }
}
