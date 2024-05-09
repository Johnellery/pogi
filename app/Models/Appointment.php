<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Mail\Mailable;
class Appointment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'first',
        'middle',
        'last',
        'age',
        'gender',
        'unit',
        'barangay',
        'city',
        'province',
        'phone',
        'fullname',
        'fee',
        'date',
        'status',
        'user_id',
        'service_id',
        'doctor_user_id',
        'note',
        'time',
        'finished'
    ];
    protected $dates = ['date'];

    // protected $casts = [
    //     'service_id' => 'array',
    // ];
    // public function role(): BelongsTo
    // {
    //     return $this->BelongsTo(Role::class, 'role_id');
    // }
    public function availability(): BelongsTo
    {
        return $this->BelongsTo(Available::class, 'user_id');
    }
    // public function user(): BelongsTo
    // {
    //     return $this->BelongsTo(User::class, 'user_id', 'id', 'role_id');
    // }
    public function role(): BelongsTo
    {
        return $this->BelongsTo(Role::class);
    }
    public function service(): BelongsTo
    {
        return $this->BelongsTo(Service::class,);
    }
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
    public function available(): HasMany
    {
        return $this->HasMany(Available::class);
    }
    public function isApproved()
    {
        return $this->status === 'approved';
    }
    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }
    public function isCompleted()
    {
        return $this->finished === 'completed';
    }
    public function isAttend()
    {
        return $this->finished === 'attend';
    }
}
