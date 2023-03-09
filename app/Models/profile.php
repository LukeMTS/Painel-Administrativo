<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'type_id',
        'customer_id',
        'username',
        'url',
        'last_access'
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function profile_types()
    {
        return $this->hasOne(ProfileType::class);
    }
}