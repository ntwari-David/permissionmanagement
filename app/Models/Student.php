<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['stu_firstname', 'stu_lastname', 'gender', 'class_name', 'level'];

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
