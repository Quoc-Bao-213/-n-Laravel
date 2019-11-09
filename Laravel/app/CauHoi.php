<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LinhVuc;
use Illuminate\Database\Eloquent\SoftDeletes;

class CauHoi extends Model
{
    use SoftDeletes;
    protected $table = 'cau_hoi';

    public function LinhVuc(){
        return $this->belongsTo('App\LinhVuc');
    }
}
