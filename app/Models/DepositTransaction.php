<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_code',
        'amount',
        'method',
        'status',
        'transaction_ref',
        'note',
        'ip_address',
        'confirmed_at',
        'proof_image_path',
    ];

    protected $casts = [
        'confirmed_at' => 'datetime',
    ];

    // Nếu có quan hệ với user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
