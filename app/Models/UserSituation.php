<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSituation extends Model
{
    use HasFactory;

    protected $table = 'user_situations';

    protected $fillable = [
        '*'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}