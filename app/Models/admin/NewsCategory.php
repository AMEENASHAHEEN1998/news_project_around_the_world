<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class NewsCategory extends Model
{
    use HasTranslations;
    public $translatable = ['news_category_name' ];

    protected $fillable = ['news_category_name' , 'Notes' ];

    public function Blogs(){
        return $this->hasMany('App\Models\admin\Blog' , 'news_category_id');
    }
}
