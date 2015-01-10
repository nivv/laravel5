<?php namespace Idun;


use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    public function parent()
    {
        return $this->belongsTo('Idun\Page', 'parent_id');
    }
}