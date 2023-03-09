<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileType extends Model
{
    use HasFactory;

    protected $table = 'profile_types';

    protected $fillable = [
        'type',
    ];

    public function profiles()
    {
        return $this->belongsTo(Profile::class);
    }
}
