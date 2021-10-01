<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable =  ['id','type','title','date','height','weight','fatPercentage','chest','biceps','waist','hip','thigh','calf','active','idUser'];

}
