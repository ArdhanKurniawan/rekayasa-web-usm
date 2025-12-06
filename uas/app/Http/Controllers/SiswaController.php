<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    // ============== CREATE =====================
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|unique:siswa',
            'nama' => 'required',
            'kelas' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $siswa = Siswa::create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Siswa created successfully',
            'data' => $siswa
        ], 201);
    }

    // ============== READ ALL =====================
    public function read()
    {
        return response()->json([
            'status' => true,
            'data' => Siswa::all()
        ]);
    }

    // ============== READ BY ID =====================
    public function readById($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'status' => false,
                'message' => 'Siswa not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $siswa
        ]);
    }

    // ============== UPDATE =====================
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'status' => false,
                'message' => 'Siswa not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kelas' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $siswa->update($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Siswa updated successfully',
            'data' => $siswa
        ]);
    }

    // ============== DELETE =====================
    public function delete($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'status' => false,
                'message' => 'Siswa not found'
            ], 404);
        }

        $siswa->delete();

        return response()->json([
            'status' => true,
            'message' => 'Siswa deleted'
        ]);
    }
}