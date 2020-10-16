<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AlsoBought extends Model {
    
    protected $table = "alsobought";
    protected $primaryKey = "alsoboughtID";

    protected $hidden = [
        'alsoboughtID',
    ];
}