<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use App\Http\Resources\CharacterResource;
use Illuminate\Support\Facades\Validator;

class CharacterController extends Controller
{
    // 1. GET: List all student (Karakter)
    public function index()
    {
        $characters = Character::all();
        return response()->json([
            'message' => 'Success',
            'data' => CharacterResource::collection($characters)
        ], 200);
    }

    // 2. POST: Create a student (Karakter)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'unit' => 'required',
            'attribute' => 'required',
            'star_rating' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Failed',
                'errors' => $validator->errors()
            ], 422); // 422 Unprocessable Entity
        }

        $character = Character::create($request->all());

        return response()->json([
            'message' => 'Success',
            'data' => new CharacterResource($character)
        ], 201); // 201 Created
    }

    // 3. GET: Get student (Karakter) by ID
    public function show(string $id)
    {
        $character = Character::find($id);

        if (is_null($character)) {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Success',
            'data' => new CharacterResource($character)
        ], 200);
    }

    // 4. PUT: Edit a student (Karakter)
    public function update(Request $request, string $id)
    {
        $character = Character::find($id);

        if (is_null($character)) {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        $character->update($request->all());

        return response()->json([
            'message' => 'Success',
            'data' => new CharacterResource($character)
        ], 200);
    }

    // 5. DEL: Delete a student (Karakter)
    public function destroy(string $id)
    {
        $character = Character::find($id);

        if (is_null($character)) {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        $character->delete();

        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
