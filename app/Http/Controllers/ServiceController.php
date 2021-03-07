<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return view('service');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|unique:services|max:255'
        ]);

        $service = new Service;
        $service->service_name = $request->service_name;
        $service->save();
        return redirect()->back()->with('success', 'Save Success');
    }
}
