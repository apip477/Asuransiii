<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Siapa yang mengajukan
            $table->string('title'); // Judul Proyek/Kontrak
            $table->text('description'); // Deskripsi Singkat
            $table->string('file_path'); // Path file yang diupload
            $table->string('status')->default('Pending'); // Status: Pending, Reviewed, Approved, Rejected
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};