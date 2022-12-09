<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    
    protected $table = 'songs';

    protected $fillable = [
        'artist_id','songname', 'genre', 'author', 'album', 'date_registered', 'background_image', 'image', 'audio',
        'file_path'
    ];

    protected $primarykey = 'id';

public function artist ()
{
    return $this->belongsTo(artist::class);
}


public function Songbackground ()
{
    return $this->hasMany(Songbackground::class);
}


}
