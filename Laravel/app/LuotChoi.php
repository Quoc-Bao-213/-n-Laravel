<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuotChoi extends Model
{
    protected $table = 'luot_choi';

    public function NguoiChoi(){
        return $this->belongsTo('App\NguoiChoi');
    }
}
