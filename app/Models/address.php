<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        'customer_id',
        'zipcode',
        'state',
        'street',
        'number',
        'complement',
        'estado',
    ];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

}
