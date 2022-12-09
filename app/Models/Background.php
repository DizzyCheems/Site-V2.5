<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;

    
    protected $table = 'backgrounds';

    protected $primarykey = 'id';

protected $fillable = [
    'artist_id', 'backgroundimg'
];

public function artist ()
{
    return $this->belongsTo(artist::class);
}

}
