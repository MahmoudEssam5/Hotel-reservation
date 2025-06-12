<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomStoreRequest;
use App\Http\Requests\RoomUpdateRequest;
use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{

    public function index(): JsonResponse
    {
        $room = Room::all();
        return response()->json($room);
    }

    public function store(RoomStoreRequest $request): JsonResponse
    {
        $attributes = $request->all();
        if($request->hasFile('image')){
            $attributes['image'] = $request->file('image')->store('images','public');
        }

        $rooms = Room::create($attributes);

        return response()->json($rooms, 201);
    }

    public function show($id): JsonResponse
    {
        $room = Room::find($id);
        return response()->json($room);
    }

    public function update(RoomUpdateRequest $request, $id): JsonResponse
    {
        $validatedData = $request->validated();

        $room = Room::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($room->image) {
                Storage::disk('public')->delete($room->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $path;
        }

        $room->update($validatedData);

        return response()->json($room);
    }


    public function destroy($id): JsonResponse
    {
        $room = Room::find($id);

        if ($room->image) {
            Storage::disk('public')->delete($room->image);
        }

        $room->delete();

        return response()->json(null, 204);
    }

}
