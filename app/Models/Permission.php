<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['student_id', 'staff_id', 'permission_name', 'description', 'time', 'date'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function staff()
    {
        return $this->belongsTo(StaffMember::class, 'staff_id');
    }
}
