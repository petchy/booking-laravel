<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    public function index()
    {
        return view('room_type');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_type_name' => 'required|unique:room_types|max:255'
        ]);

        $room_type = new RoomType;
        $room_type->room_type_name = $request->room_type_name;
        $room_type->save();
        return redirect()->back()->with('success', 'Save Success');
    }
}
