<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->orderBy('sort_order')->get();
        return view('services.index', compact('services'));
    }

    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->where('active', true)->firstOrFail();
        $otherServices = Service::active()->where('id', '!=', $service->id)->orderBy('sort_order')->take(5)->get();
        return view('services.show', compact('service', 'otherServices'));
    }
}