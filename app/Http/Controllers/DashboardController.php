<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StaffMember;
use App\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents    = Student::count();
        $totalStaff       = StaffMember::count();
        $totalPermissions = Permission::count();
        $todayPermissions = Permission::whereDate('date', today())->count();

        return view('dashboard', compact('totalStudents', 'totalStaff', 'totalPermissions', 'todayPermissions'));
    }
}
