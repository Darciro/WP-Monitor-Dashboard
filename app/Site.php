<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url', 'description', 'security-token', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '_token',
    ];

    /**
     * Validation rules
     *
     */
    public $rules = [
        'name'           => 'required|min:3|max:100',
        'url'            => 'required|min:3|max:100',
        'description'    => 'min:3|max:100',
        'security-token' => 'required|min:6'
    ];
}
