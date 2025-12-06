<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    // ============== CREATE =====================
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:kelas',
            'nama' => 'required',
            'kapasitas' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $kelas = Kelas::create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Kelas created successfully',
            'data' => $kelas
        ], 201);
    }

    // ============== READ ALL =====================
    public function read()
    {
        return response()->json([
            'status' => true,
            'data' => Kelas::all()
        ]);
    }

    // ============== READ BY ID =====================
    public function readById($id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json([
                'status' => false,
                'message' => 'Kelas not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $kelas
        ]);
    }

    // ============== UPDATE =====================
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json([
                'status' => false,
                'message' => 'Kelas not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'kapasitas' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $kelas->update($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Kelas updated successfully',
            'data' => $kelas
        ]);
    }

    // ============== DELETE =====================
    public function delete($id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json([
                'status' => false,
                'message' => 'Kelas not found'
            ], 404);
        }

        $kelas->delete();

        return response()->json([
            'status' => true,
            'message' => 'Kelas deleted'
        ]);
    }
}