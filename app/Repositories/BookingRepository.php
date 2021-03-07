<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Http;

class BookingRepository implements BookingRepositoryInterface
{
	public function checkRoom($params)
    {
        $response = Http::post('http://34.87.142.215/aspire-project/public/booking-box/api-test', $params);
        return json_decode($response->body(), true);
	}
}
