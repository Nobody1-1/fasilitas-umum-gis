<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class mapController extends Controller
{
    public function index()
    {
        return view('map');
    }

    public function getFacilities(Request $request)
    {
        // Cek apakah ada parameter 'query'
        if ($request->has('query')) {
            // Cari fasilitas berdasarkan query
            $facilities = Facility::where('name', 'like', '%' . $request->query('query') . '%')
                ->with(['reviews.user']) // Sertakan review dan user terkait
                ->get();
        } else {
            // Ambil semua fasilitas dengan review dan user terkait
            $facilities = Facility::with(['reviews.user'])->get();
        }
    
        // Return data dalam format JSON
        return response()->json([
            'data' => $facilities,
        ]);
    }
    
    public function markAsVisited($id)
    {
        $facility = Facility::find($id); 
        if (!$facility) {
            return response()->json(['error' => 'Facility not found'], 404);
        }
        $facility->increment('total_visits');
        return response()->json(['message' => 'Visit recorded successfully!', 'total_visits' => $facility->total_visits]);
        }
}
