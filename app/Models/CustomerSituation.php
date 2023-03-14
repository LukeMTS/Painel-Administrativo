<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSituation extends Model
{
    use HasFactory;

    protected $table = 'customers_situations';

    protected $fillable = [
        'situation',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'situation_id');
    }
}
