<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    
    // Array $fillable mendefinisikan kolom mana saja yang boleh 
    // diisi melalui mass assignment (yaitu, dari Controller)
    protected $fillable = [
        'user_id', 
        'policy_number', 
        'claim_date', 
        'location', 
        'description',
        'document_contract_path', 
        'document_loss_path',
        'status',
    ];

    // Relasi ke User: Menghubungkan klaim ini ke pengguna yang mengajukan
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}