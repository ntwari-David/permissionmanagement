<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    protected $fillable = ['staff_names', 'position', 'telephone'];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'staff_id');
    }
}
