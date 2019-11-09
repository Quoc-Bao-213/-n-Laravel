<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietLuotChoi extends Model
{
    protected $table = 'chi_tiet_luot_choi';

    public function CauHoi(){
        return $this->belongsTo('App\CauHoi');
    }

    public function LuotChoi(){
        return $this->belongsTo('App\LuotChoi');
    }
}
