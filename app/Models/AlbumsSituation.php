<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumsSituation extends Model
{
    use HasFactory;

    protected $table = 'albums_situations';

    protected $fillable = [
        'situation',
    ];

    public function albums()
    {
        return $this->hasMany(Album::class, 'situation_id');
    }
}
