<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasTranslations;
    public $translatable = ['blog_name' , 'short_note' , 'long_notes' ,'Status'];

    protected $fillable = ['blog_name' , 'short_note' , 'long_notes' , 'image_name' , 'news_category_id' ,'views','user_id','Status' ,'Value_Status','news_Date'];

    public function NewsCategory()
    {
        return $this->belongsTo('App\Models\admin\NewsCategory' , 'news_category_id');
    }

    public function Comments()
    {
        return $this->hasMany('App\comment' , 'blog_id');
    }
    public function User()
    {
        return $this->belongsTo('App\Models\admin\Blog' , 'user_id');
    }
}
