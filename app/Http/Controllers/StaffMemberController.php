<?php

namespace App\Http\Controllers;

use App\Models\StaffMember;
use Illuminate\Http\Request;

class StaffMemberController extends Controller
{
    public function index()
    {
        $staff = StaffMember::latest()->paginate(10);
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'staff_names' => 'required|string|max:150',
            'position'    => 'required|string|max:100',
            'telephone'   => 'required|string|max:20',
        ]);

        StaffMember::create($request->all());
        return redirect()->route('staff.index')->with('success', 'Staff member added successfully.');
    }

    public function edit(StaffMember $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, StaffMember $staff)
    {
        $request->validate([
            'staff_names' => 'required|string|max:150',
            'position'    => 'required|string|max:100',
            'telephone'   => 'required|string|max:20',
        ]);

        $staff->update($request->all());
        return redirect()->route('staff.index')->with('success', 'Staff member updated successfully.');
    }

    public function destroy(StaffMember $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
