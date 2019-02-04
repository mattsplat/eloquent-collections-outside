<?php

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    public function todos()

    {
        return $this->hasMany(Todo::class);

    }
}