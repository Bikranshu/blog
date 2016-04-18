<?php

namespace App\Models;

/**
 * @author Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 */
class Post extends \Eloquent
{

    public $timestamps = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('title', 'body', 'slug', 'author_id');

    /**
     * validation rules
     *
     */
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
        'slug' => 'required',
        'active' => 'required'
    );

    /**
     * Get the author.
     */
    public function Author()
    {

        return $this->belongsTo('User', 'author_id');
    }

    /**
     * @return string
     */
    public function getActiveLabelAttribute()
    {
        switch ($this->active) {
            case 0:
                return '<span class="label label-danger">Draft</span>';

            case 1:
                return '<span class="label label-success">Publish</span>';
        }
    }

}
