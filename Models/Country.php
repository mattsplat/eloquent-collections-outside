<?php

use Illuminate\Database\Eloquent\Model;


class Country extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function todos()
    {
        return $this->hasManyThrough(
            Todo::class,
            User::class,
            'country_id',
            'user_id',
            'id',
            'id'
            );
    }
}