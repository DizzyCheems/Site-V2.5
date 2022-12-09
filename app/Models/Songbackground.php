<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songbackground extends Model
{
    use HasFactory;


    protected $table = 'songbackgrounds';

    protected $fillable = [
        'song_id','songbackgroundimg'
    ];

    protected $primarykey = 'id';

public function song ()
{
    return $this->belongsTo(Song::class);
}



}
