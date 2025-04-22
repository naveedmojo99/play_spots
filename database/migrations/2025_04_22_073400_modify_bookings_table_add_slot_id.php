<?php

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
        Schema::table('bookings', function (Blueprint $table) {
            // Drop old time columns
            $table->dropColumn(['start_time', 'end_time']);

            // Add slot_id as foreign key
            $table->foreignId('slot_id')->after('venue_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Rollback: remove slot_id and add back start_time and end_time
            $table->dropForeign(['slot_id']);
            $table->dropColumn('slot_id');

            $table->time('start_time')->after('booking_date');
            $table->time('end_time')->after('start_time');
        });
    }
};
