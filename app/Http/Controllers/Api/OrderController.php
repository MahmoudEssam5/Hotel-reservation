<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        $order = Order::with(['user', 'room'])->get();
        return response()->json($order);
    }

    function hasRoomBeenBookedBefore($roomId)
    {
        // التحقق من وجود حجز سابق للغرفة باستخدام استعلام بسيط
        return Order::where('room_id', $roomId)->exists();
    }
    public function OrderStore(OrderStoreRequest $request): JsonResponse
    {
        // الحصول على المدخلات
        $roomId = $request->input('room_id');
        $startTime = Carbon::parse($request->input('start_day'));
        $endTime = Carbon::parse($request->input('end_day'));


        if ($this->hasRoomBeenBookedBefore($roomId)) {

            $isAvailable = $this->isRoomAvailable($roomId, $startTime, $endTime);

            if ($isAvailable) {

                $attributes = $request->all();
                $orders = Order::create($attributes)->with(['user', 'room'])->get();
                return response()->json(['success' => 'Room booked successfully', 'orders' => $orders], 201);

            } else {

                $nextAvailableTime = Order::where('room_id', $roomId)
                    ->where('end_day', '>', $startTime)
                    ->orderBy('end_day', 'asc')
                    ->first();

                $availableTime = $nextAvailableTime ? $nextAvailableTime->end_time : null;

                return response()->json([
                    'error' => 'Room is not available',
                    'available_until' => $availableTime
                ], 422);
            }
        } else {

            $attributes = $request->all();
            $orders = Order::create($attributes)->with(['user', 'room'])->get();
            return response()->json(['success' => 'Room booked successfully for the first time', 'orders' => $orders], 201);
        }
    }

    private function isRoomAvailable($roomId, $startTime, $endTime)
    {
        $conflictingBookings = Order::where('room_id', $roomId)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_day', [$startTime, $endTime])
                    ->orWhereBetween('end_day', [$startTime, $endTime])
                    ->orWhere(function ($query) use ($startTime, $endTime) {
                        $query->where('start_day', '<=', $startTime)
                            ->where('end_day', '>=', $endTime);
                    });
            })
            ->exists();

        return !$conflictingBookings;
    }


}

