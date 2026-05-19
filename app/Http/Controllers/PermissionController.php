<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Student;
use App\Models\StaffMember;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::with(['student', 'staff'])->latest()->paginate(10);
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        $students = Student::all();
        $staff    = StaffMember::all();
        return view('permissions.create', compact('students', 'staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id'      => 'required|exists:students,id',
            'staff_id'        => 'required|exists:staff_members,id',
            'permission_name' => 'required|string|max:150',
            'description'     => 'required|string',
            'time'            => 'required',
            'date'            => 'required|date',
        ]);

        Permission::create($request->all());
        return redirect()->route('permissions.index')->with('success', 'Permission added successfully.');
    }

    public function edit(Permission $permission)
    {
        $students = Student::all();
        $staff    = StaffMember::all();
        return view('permissions.edit', compact('permission', 'students', 'staff'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'student_id'      => 'required|exists:students,id',
            'staff_id'        => 'required|exists:staff_members,id',
            'permission_name' => 'required|string|max:150',
            'description'     => 'required|string',
            'time'            => 'required',
            'date'            => 'required|date',
        ]);

        $permission->update($request->all());
        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
