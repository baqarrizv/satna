<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Services\EventNotificationService;
use DataTables;

class DepartmentController extends Controller
{   
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $departments = Department::query();
            
            return Datatables::of($departments)
                ->addIndexColumn()
                ->addColumn('action', function($department) {
                    $actions = '';
                    
                    if (auth()->user()->can('Edit Department')) {
                        $actions .= '<a href="' . route('departments.edit', $department->id) . '" class="btn btn-outline-secondary btn-sm">
                            <i class="uil-pen"></i>
                        </a>';
                    }
                    
                    if (auth()->user()->can('Delete Department')) {
                        $actions .= '<form action="' . route('departments.destroy', $department->id) . '" method="POST" style="display:inline-block;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm(\'Are you sure?\')">
                                <i class="uil-trash"></i>
                            </button>
                        </form>';
                    }
                    
                    return $actions;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('departments.index');
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments,name',
            'sequence' => 'required|integer',
        ]);

        Department::create($request->all());

        EventNotificationService::notifyEventByName('Department Created');

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|unique:departments,name,' . $department->id,
            'sequence' => 'required|integer',
        ]);

        $department->update($request->all());
        
        EventNotificationService::notifyEventByName('Department Modified');

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        
        EventNotificationService::notifyEventByName('Department Deleted');

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
