<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    // ============== CREATE =====================
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:guru',
            'nama' => 'required',
            'mapel' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $guru = Guru::create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Guru created successfully',
            'data' => $guru
        ], 201);
    }

    // ============== READ ALL =====================
    public function read()
    {
        return response()->json([
            'status' => true,
            'data' => Guru::all()
        ]);
    }

    // ============== READ BY ID =====================
    public function readById($id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json([
                'status' => false,
                'message' => 'Guru not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $guru
        ]);
    }

    // ============== UPDATE =====================
    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json([
                'status' => false,
                'message' => 'Guru not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'mapel' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $guru->update($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Guru updated successfully',
            'data' => $guru
        ]);
    }

    // ============== DELETE =====================
    public function delete($id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json([
                'status' => false,
                'message' => 'Guru not found'
            ], 404);
        }

        $guru->delete();

        return response()->json([
            'status' => true,
            'message' => 'Guru deleted'
        ]);
    }
}