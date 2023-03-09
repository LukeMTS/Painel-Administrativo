<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';

    protected $fillable = [
        'customer_id',
        'multimedia_id',
        'situation_id',
        'profile',
        'type',
        'title',
        'description',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function albums_situations()
    {
        return $this->hasOne(AlbumsSituation::class);
    }

    public function multimedia()
    {
        return $this->hasMany(Multimedia::class);
    }
}
