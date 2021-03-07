<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Repositories\BookingRepositoryInterface;

class CheckBookingController extends Controller
{
    private $repository;

    public function __construct(BookingRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('check_booking', ['room_types' => RoomType::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_type_id' => 'required',
            'date' => 'required|date_format:Y-m-d'
        ]);

        $params = array();
        $params['date'] = $request->date;
        $params['room_type_id'] = $request->room_type_id;
        $response = $this->repository->checkRoom($params);
        $result = $this->prepare_data($response);
        return view('check_booking', ['room_types' => RoomType::all(), 'result' => $result]);
    }

    private function prepare_data($response)
    {
        $result = array();
        if (!empty($response['price'])) {
            $result['status'] = 'success';
            $result['price'] = $response['price'];
            $result['date'] = $response['date'];
            $result['room_left'] = $response['room_left'];
        } elseif (empty($response['price']) && !empty($response['date'])) {
            $result['status'] = 'fail';
            $result['date'] = $response['date'];
            $result['room_left'] = $response['room_left'];
        } else {
            $result['status'] = 'error';
            $result['message'] = $response['message'];
        }

        return $result;
    }
}
