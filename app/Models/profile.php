<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'type_id',
        'customer_id',
        'username',
        'url',
        'last_access',
        'profile_type_id',
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
