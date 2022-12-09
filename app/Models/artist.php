<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artist extends Model
{
    use HasFactory;
    
    protected $table = 'artists';

    protected $primarykey = 'id';

protected $fillable = [
    'artistname', 'realname', 'number','genre', 'mail', 'dateregistered', 'background_img', 'secondbackground_img', 'nationality',
    'address', 'image'
];

public function song()
{
    return $this->hasMany(Song::class);
}

public function background()
{
    return $this->hasMany(Background::class);
}

}
