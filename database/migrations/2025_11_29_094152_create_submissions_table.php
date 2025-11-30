<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Menambahkan kolom user_id, title, file_path, dan status.
     */
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            
            // Kolom untuk menghubungkan pengajuan dengan User yang login
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            // Detail Pengajuan
            $table->string('title'); // Judul Proyek/Kontrak
            $table->text('description'); // Deskripsi Singkat Proyek
            $table->string('file_path'); // Path file yang diupload (dokumen kontrak)
            
            // Status Aksi Admin
            $table->string('status')->default('pending'); // Status: pending, approved, rejected
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};