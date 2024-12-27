<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Resource;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'resource_id' => 'required|exists:resources,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Проверка доступности ресурса
        $resource = Resource::find($request->resource_id);
        $existingBooking = $resource->bookings()
            ->whereBetween('start_date', [$request->start_date, $request->end_date])
            ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
            ->exists();

        if ($existingBooking) {
            return response()->json(['message' => 'Ресурс недоступен на выбранные даты'], 400);
        }

        $booking = Booking::create($request->all());
        return response()->json($booking, 201);
    }
}
