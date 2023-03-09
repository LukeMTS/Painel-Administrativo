<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'situation_id',
        'username',
        'fullname',
        'cpf',
        'rg',
        'birthdate',
        'email',
        'phone',
    ];

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function customers_situations()
    {
        return $this->hasOne(CustomerSituation::class);
    }

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
