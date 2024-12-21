<?php
namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class fasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Facility::all();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create()
    {
        return view('admin.fasilitas.create');
    }

    public function store(Request $request)
{
    // Validasi data
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string',
        'description' => 'nullable|string',
        'longitude' => 'required|string',
        'latitude' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        
        // Mendapatkan nama file asli
        $filename = time() . '.' . $image->getClientOriginalExtension();
        
        // Tentukan path tujuan
        $destinationPath = public_path('storage/images');
        
        // Pindahkan file ke folder tujuan
        $image->move($destinationPath, $filename);
    
        // Simpan path gambar ke database
        Facility::create([
            'name' => $data['name'],
            'category' => $data['category'],
            'description' => $data['description'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'image' => 'images/' . $filename, // Menyimpan path gambar relatif
        ]);
    
        return redirect()->route('fasilitas.index')->with('success', 'Facility created successfully.');
    }
    
    


    return back()->with('error', 'Image upload failed.');
}


    

    public function getFacilities(Request $request)
    {
        if ($request->has('query')) {
            $facilities = Facility::where('name', 'like', '%' . $request->query('query') . '%')->get();
        } else {
            $facilities = Facility::all();
        }

        return response()->json($facilities);
    }

    public function edit(Facility $facility)
    {
        return view('admin.fasilitas.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $facility->update($data);

        return redirect()->route('fasilitas.index')->with('success', 'Facility updated successfully.');
    }

    public function destroy($id)
    {
        $facility = Facility::find($id);
        $facility->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Facility deleted successfully.');
    }
}
