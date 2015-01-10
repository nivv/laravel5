<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    public function parent()
    {
        return $this->belongsTo('App\Page', 'parent_id');
    }
}