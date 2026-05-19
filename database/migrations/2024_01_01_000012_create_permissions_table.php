<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('staff_members')->onDelete('cascade');
            $table->string('permission_name');
            $table->text('description');
            $table->time('time');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('permissions');
    }
};
