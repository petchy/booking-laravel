<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\RoomType;
use App\Models\ServiceRoomType;
use Illuminate\Validation\Rule;

class ServiceRoomTypeController extends Controller
{
    public function index()
    {
        return view('service_room_type', [
            'services' => Service::all(),
            'room_types' => RoomType::all()
        ]);
    }

    public function store(Request $request)
    {
        $uniqueRule =  Rule::unique('service_room_types')->where(function ($query) use
                    ($request){
                        return $query->where('service_id', $request->service_id)
                        ->where('room_type_id', $request->room_type_id);
                    });

        $request->validate([
            'service_id' => ['required', $uniqueRule],
            'room_type_id' => 'required'
        ]);

        $service_room_type = new ServiceRoomType;
        $service_room_type->service_id = $request->service_id;
        $service_room_type->room_type_id = $request->room_type_id;
        $service_room_type->save();
        return redirect()->back()->with('success', 'Save Success');
    }
}
