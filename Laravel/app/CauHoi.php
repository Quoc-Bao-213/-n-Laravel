<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LinhVuc;

class CauHoi extends Model
{
    protected $table = 'cau_hoi';

    public function LinhVuc(){
        return $this->belongsTo('App\LinhVuc');
    }
}
