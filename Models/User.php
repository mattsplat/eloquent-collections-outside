<?php

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    public function todos()

    {
        return $this->hasMany(Todo::class);

    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable');
    }

    public function getFirstNameAttribute()
    {
        return explode(' ', $this->name)[0] ?? null;
    }


}