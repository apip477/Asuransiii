<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Work extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi
    protected $fillable = [
        'user_id', 'title', 'description', 'file_path', 'certificate_number', 'status'
    ];

    /**
     * Relasi: Karya ini dimiliki oleh siapa.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}