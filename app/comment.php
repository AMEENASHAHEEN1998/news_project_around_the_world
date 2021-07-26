<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class comment extends Model
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['comment' ,'blog_id' , 'user_id'];

    public function blog(){
        return $this->belongsTo('App\Models\admin\Blog' , 'blog_id' , 'id');
    }

    public function user(){
        return $this->belongsTo('App\User' , 'user_id' , 'id');
    }
}
