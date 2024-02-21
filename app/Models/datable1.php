<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class datable1 extends Eloquent
{
    use HasFactory;
    protected $collection = 'datable1s';
    protected $connection = 'mongodb';
    use SoftDeletes;
    protected $guarded = [
       
    ];

    public function sumData(){
        
    }

}