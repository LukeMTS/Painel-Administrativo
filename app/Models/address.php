<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
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
        'city',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

}
