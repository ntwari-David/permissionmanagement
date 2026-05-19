<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $type  = $request->get('type', 'daily');
        $date  = $request->get('date', now()->toDateString());
        $month = $request->get('month', now()->format('Y-m'));

        $query = Permission::with(['student', 'staff']);

        if ($type === 'monthly') {
            [$year, $mon] = explode('-', $month);
            $query->whereYear('date', $year)->whereMonth('date', $mon);
        } else {
            $query->whereDate('date', $date);
        }

        $permissions = $query->orderBy('date')->orderBy('time')->get();

        return view('reports.index', compact('permissions', 'type', 'date', 'month'));
    }
}
