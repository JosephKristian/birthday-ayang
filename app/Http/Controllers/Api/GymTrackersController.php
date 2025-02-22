<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GymTracker;
use Illuminate\Http\Request;

class GymTrackersController extends Controller
{
    //
     // Ambil semua data gym tracker
     public function index()
     {
         return response()->json(GymTracker::all(), 200);
     }
 
     // Simpan data baru
     public function store(Request $request)
     {
         $request->validate([
             'user_id' => 'required',
             'calories' => 'required|integer',
             'protein' => 'required|integer',
             'weight' => 'nullable|integer',
         ]);
 
         $gymTracker = GymTracker::create($request->all());
         return response()->json($gymTracker, 201);
     }
 
     // Tampilkan data berdasarkan ID
     public function show($id)
     {
         $gymTracker = GymTracker::find($id);
         if (!$gymTracker) {
             return response()->json(['message' => 'Data not found'], 404);
         }
         return response()->json($gymTracker, 200);
     }
 
     // Update data berdasarkan ID
     public function update(Request $request, $id)
     {
         $gymTracker = GymTracker::find($id);
         if (!$gymTracker) {
             return response()->json(['message' => 'Data not found'], 404);
         }
 
         $request->validate([
             'calories' => 'sometimes|integer',
             'protein' => 'sometimes|integer',
             'weight' => 'nullable|integer',
         ]);
 
         $gymTracker->update($request->all());
         return response()->json($gymTracker, 200);
     }
 
     // Hapus data berdasarkan ID
     public function destroy($id)
     {
         $gymTracker = GymTracker::find($id);
         if (!$gymTracker) {
             return response()->json(['message' => 'Data not found'], 404);
         }
 
         $gymTracker->delete();
         return response()->json(['message' => 'Deleted successfully'], 200);
     }
}
