<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class khoiphuc extends Model
{
    use SoftDeletes;

    public function LinhVuc(){
        return $this->belongsTo('App\LinhVuc');
    }
    public function CauHoi(){
        return $this->belongsTo('App\CauHoi');
    }
    public function NguoiChoi(){
        return $this->belongsTo('App\NguoiChoi');
    }
    public function GoiCredit(){
        return $this->belongsTo('App\GoiCredit');
    }
    public function LuotChoi(){
        return $this->belongsTo('App\LuotChoi');
    }
}
