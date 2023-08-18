<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Enums\ProcessStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Event;

class Process extends Model
{

    use HasFactory, softDeletes;

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
