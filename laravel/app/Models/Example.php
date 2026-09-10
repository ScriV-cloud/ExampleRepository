<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'track_id',
        'listen_at',
        'source_type',
        'source_id',
        'is_offline',
        'duration'];
}
