<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;

    protected $table = 'multimedia';

    protected $fillable = [
        'path',
        'album_id',
    ];

    public function albums_situations()
    {
        return $this->hasOne(AlbumsSituation::class);
    }

    public function albums()
    {
        return $this->belongsTo(Album::class);
    }
}
