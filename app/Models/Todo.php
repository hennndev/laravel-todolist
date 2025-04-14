<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ["name", "category", "description", "start_time", "end_time"];

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
