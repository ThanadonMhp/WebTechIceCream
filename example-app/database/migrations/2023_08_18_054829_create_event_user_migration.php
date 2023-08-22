<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Event;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Event::class);
            $table->foreignIdFor(User::class);
            $table->enum('role', ['PARTICIPANT', 'HOST', 'REQUESTED', 'MEMBER'])->default('REQUESTED')->comment('HOST or PARTICIPANT or REQUESTED');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
