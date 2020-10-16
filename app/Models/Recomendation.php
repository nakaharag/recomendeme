<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Recomendation extends Model {

    protected $table = "recomendation";
    protected $primaryKey = "recomendationID";
    protected $foreignKey = "scoreComponentsID";

    protected $fillable = [
        "recomendationID",
        "CustomerID",
        "json"
    ];

    protected $hidden = [
        'recomendationID',
        'scoreComponentsID',
        'CustomerID'
    ];

    public function scoreComponents(){
        return $this->hasMany('App\Models\scoreComponents', 'scoreComponentsID');
    }
}   