<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class scoreComponents extends Model {
    protected $table = "scoreComponents";
    protected $primaryKey = "scoreComponentsID";

    protected $hidden = [
        'scoreComponentsID',
    ];

    public function recomendation()
    {
        return $this->morphedByMany('App\Models\Recomendation', 'scoreComponentsID'); 
    }
}