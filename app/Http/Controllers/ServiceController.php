<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Services\EventNotificationService;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $services = Service::with('department')
                ->select('services.*');
            
            // Apply department filter
            if ($request->has('department_id') && !empty($request->department_id)) {
                $services->where('department_id', $request->department_id);
            }
            
            return Datatables::of($services)
                ->addIndexColumn()
                ->addColumn('action', function($service) {
                    $actions = '';
                    
                    if (auth()->user()->can('Edit Service')) {
                        $actions .= '<a href="' . route('services.edit', $service->id) . '" class="btn btn-outline-secondary btn-sm">
                            <i class="uil-pen"></i>
                        </a>';
                    }
                    
                    if (auth()->user()->can('Delete Service')) {
                        $actions .= '<form action="' . route('services.destroy', $service->id) . '" method="POST" style="display:inline-block;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm(\'Are you sure?\')">
                                <i class="uil-trash"></i>
                            </button>
                        </form>';
                    }
                    
                    return $actions;
                })
                ->editColumn('charges', function($service) {
                    return number_format($service->charges, 0);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('services.index');
    }

    public function create()
    {
        $departments = Department::all();
        return view('services.create', compact('departments'));
    }

    public function store(Request $request)
    {
        // Unformat the charges before validation
        if ($request->has('charges')) {
            $request->merge(['charges' => $this->unformat_number($request->charges)]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'charges' => 'required|numeric|min:0|max:9999999999',
        ]);

        Service::create($validated);

        EventNotificationService::notifyEventByName('Service Created');

        return redirect()->route('services.index')->with('success', 'Service created successfully');
    }

    public function edit(Service $service)
    {
        $departments = Department::all();
        $service->charges = number_format($service->charges, 0);
        return view('services.edit', compact('service', 'departments'));
    }

    public function update(Request $request, Service $service)
    {
        // Unformat the charges before validation
        if ($request->has('charges')) {
            $request->merge(['charges' => $this->unformat_number($request->charges)]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'charges' => 'required|numeric|min:0|max:9999999999',
        ]);

        $service->update($validated);

        EventNotificationService::notifyEventByName('Service Modified');

        return redirect()->route('services.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        EventNotificationService::notifyEventByName('Service Deleted');

        return redirect()->route('services.index')->with('success', 'Service deleted successfully');
    }
    function unformat_number($formatted)
    {
        return str_replace(',', '', $formatted);
    }
}
