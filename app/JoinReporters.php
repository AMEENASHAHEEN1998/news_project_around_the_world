<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinReporters extends Model
{
    protected $fillable = ['user_id','gender' , 'birth_Date' , 'college' , 'average' , 'reason' , 'certificate_photo' , 'photograph'];

    public function User(){
        return $this->belongsTo(User::class , 'user_id');
    }

}
