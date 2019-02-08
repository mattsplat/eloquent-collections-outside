<?php
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function noteable()
    {
        return $this->morphTo();
    }
}