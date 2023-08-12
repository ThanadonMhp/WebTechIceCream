<?php

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Event::class);
            $table->foreignIdFor(User::class);
            $table->enum('role', ['PARTICIPANT', 'HOST'])->default('PARTICIPANT')->comment('HOST or PARTICIPANT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_events');
    }
};
