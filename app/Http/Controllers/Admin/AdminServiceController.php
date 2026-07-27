<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->paginate(15);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service, 'action' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:200',
            'icon' => 'nullable|string|max:10',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'features' => 'nullable|string|max:5000',
            'technologies' => 'nullable|string|max:1000',
            'sort_order' => 'nullable|integer|min:0',
            'active' => 'nullable|boolean',
        ]);
        $data['icon'] = $data['icon'] ?: '🔧';
        $data['features'] = $data['features'] ? array_values(array_filter(array_map('trim', preg_split('/\R/', $data['features'])))) : null;
        $data['technologies'] = $data['technologies'] ? array_values(array_filter(array_map('trim', explode(',', $data['technologies'])))) : null;
        $data['sort_order'] ??= 0;
        $data['active'] = $request->has('active');
        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service créé.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', ['service' => $service, 'action' => 'edit']);
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required|string|max:200',
            'icon' => 'nullable|string|max:10',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'features' => 'nullable|string|max:5000',
            'technologies' => 'nullable|string|max:1000',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        $data['icon'] = $data['icon'] ?: '🔧';
        $data['features'] = $data['features'] ? array_values(array_filter(array_map('trim', preg_split('/\R/', $data['features'])))) : null;
        $data['technologies'] = $data['technologies'] ? array_values(array_filter(array_map('trim', explode(',', $data['technologies'])))) : null;
        $data['sort_order'] ??= 0;
        $data['active'] = $request->has('active');
        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service mis à jour.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service supprimé.');
    }
}
