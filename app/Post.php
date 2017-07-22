<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table="posts";
    public function users()
    {
       return $this->belongsTo(User::class,'user_id');
    }
    public function departments()
    {
       return $this->belongsTo(Department::class,'department_id');
    }
}
