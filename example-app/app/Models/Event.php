<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Enums\EventStatus;
use App\Models\User;

class Event extends Model
{
    protected $casts = [
        'status' => EventStatus::class
    ];

    use HasFactory, SoftDeletes;

    public function user(): HasMany
    {
        return $this->belongsTo(User::class)->withPivot('role');
    }

    public function process(): HasMany
    {
        return $this->hasMany(Process::class);
    }

}
