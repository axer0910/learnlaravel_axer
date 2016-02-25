<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    public function hasManyArticleComments()
    {
        return $this->hasMany('App\Article_comment','article_id','id');
    }
}
