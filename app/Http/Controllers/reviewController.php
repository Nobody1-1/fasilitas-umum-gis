<?php
namespace App\Http\Controllers;
use App\Models\Facility;
use App\Models\Review;
use Illuminate\Http\Request;

class reviewController extends Controller
{
    public function index(Request $request)
    {
        $reviews = Review::with('user','facility')->get();
        $facility = Facility::all();
        

        return view('admin.reviews.index', compact('reviews','facility'));
    }

    public function reply(Request $request, Review $review)
    {
        $request->validate([
            'admin_reply' => 'required|string',
        ]);

        $review->update(['admin_reply' => $request->admin_reply]);

        return redirect()->back()->with('success', 'Reply added successfully.');
    }
}
