<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service(), 'action' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:200',
            'icon' => 'nullable|string|max:10',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'features' => 'nullable|string',
            'technologies' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'active' => 'nullable|boolean',
        ]);
        $data['slug'] = Str::slug($data['title']);
        $data['features'] = $data['features'] ? array_filter(array_map('trim', explode("\n", $data['features']))) : null;
        $data['technologies'] = $data['technologies'] ? array_filter(array_map('trim', explode(',', $data['technologies']))) : null;
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
            'features' => 'nullable|string',
            'technologies' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);
        $data['features'] = $data['features'] ? array_filter(array_map('trim', explode("\n", $data['features']))) : null;
        $data['technologies'] = $data['technologies'] ? array_filter(array_map('trim', explode(',', $data['technologies']))) : null;
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