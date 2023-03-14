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
        return $this->hasOne(Address::class);
    }

    public function albums()
    {
        return $this->hasOne(Album::class);
    }

    public function customers_situations()
    {
        return $this->belongsTo(CustomerSituation::class, 'situation_id');
    }

    public function profiles()
    {
        return $this->hasOne(Profile::class);
    }
}
