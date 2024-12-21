<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Facility;
use App\Models\Review;
use App\Models\Report;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index(Request $request)
    {
    // Tentukan filter berdasarkan input dari query string
        $filter = $request->input('filter', 'today'); // Default filter 'today'
        $data = Facility::join('reviews', 'facilities.id', '=', 'reviews.facility_id')
        ->select('facilities.category', DB::raw('AVG(reviews.rating) as average_rating'))
        ->groupBy('facilities.category')
        ->get();

        // Ambil data berdasarkan filter yang dipilih
        switch ($filter) {
            case 'today':
                // hari ini
                $totalUsers = User::whereDate('created_at', Carbon::today())->count();
                $usersYesterday = User::whereDate('created_at', Carbon::today()->subDay())->count();
                $usersIncrease = $this->calculateGrowthPercentage($totalUsers, $usersYesterday);

                $totalReviews = Review::whereDate('created_at', Carbon::today())->count();
                $reviewsYesterday = Review::whereDate('created_at', Carbon::today()->subDay())->count();
                $reviewsIncrease = $this->calculateGrowthPercentage($totalReviews, $reviewsYesterday);

                $totalVisits = Facility::whereDate('updated_at', Carbon::today())->count();
                $visitsYesterday = Facility::whereDate('updated_at', Carbon::today()->subDay())->sum('total_visits'); 
                $visitsIncrease = $this->calculateGrowthPercentage($totalVisits, $visitsYesterday);
                break;
            case 'month':
                // bulan
                $totalUsers = User::whereDate('created_at', Carbon::today()->month)->count();
                $usersLastMonth = User::whereDate('created_at', Carbon::today()->subMonth())->count();
                $usersIncrease = $this->calculateGrowthPercentage($totalUsers, $usersLastMonth);

                $totalReviews = Review::whereDate('created_at', Carbon::today()->month)->count();
                $reviewsLastMonth = Review::whereDate('created_at', Carbon::today()->subMonth())->count();
                $reviewsIncrease = $this->calculateGrowthPercentage($totalReviews, $reviewsLastMonth);

                $totalVisits = Facility::whereDate('updated_at', Carbon::today()->month)->count();
                $visitsLastMonth = Facility::whereDate('updated_at', Carbon::today()->subMonth())->sum('total_visits'); 
                $visitsIncrease = $this->calculateGrowthPercentage($totalVisits, $visitsLastMonth);
                break;
            case 'year':
                // tahun
                $totalUsers = User::whereDate('created_at', Carbon::today()->year)->count();
                $usersLastYear = User::whereDate('created_at', Carbon::today()->subYear())->count();
                $usersIncrease = $this->calculateGrowthPercentage($totalUsers, $usersLastYear);

                $totalReviews = Review::whereDate('created_at', Carbon::today()->year)->count();
                $reviewsLastYear = Review::whereDate('created_at', Carbon::today()->subYear())->count();
                $reviewsIncrease = $this->calculateGrowthPercentage($totalReviews, $reviewsLastYear);

                $totalVisits = Facility::whereDate('updated_at', Carbon::today()->year)->count();
                $visitsLastYear = Facility::whereDate('updated_at', Carbon::today()->subYear())->sum('total_visits'); 
                $visitsIncrease = $this->calculateGrowthPercentage($totalVisits, $visitsLastYear);
                break;
            default:
                // hari ini
                $totalUsers = User::whereDate('created_at', Carbon::today())->count();
                $usersYesterday = User::whereDate('created_at', Carbon::today()->subDay())->count();
                $usersIncrease = $this->calculateGrowthPercentage($totalUsers, $usersYesterday);

                $totalReviews = Review::whereDate('created_at', Carbon::today())->count();
                $reviewsYesterday = Review::whereDate('created_at', Carbon::today()->subDay())->count();
                $reviewsIncrease = $this->calculateGrowthPercentage($totalReviews, $reviewsYesterday);

                $totalVisits = Facility::whereDate('updated_at', Carbon::today())->count();
                $visitsYesterday = Facility::whereDate('updated_at', Carbon::today()->subDay())->sum('total_visits'); 
                $visitsIncrease = $this->calculateGrowthPercentage($totalVisits, $visitsYesterday);
                break;
        }
        $dataVisits = Facility::select('category', DB::raw('SUM(total_visits) as total_visits'))
        ->groupBy('category')
        ->get();



       

        $averageRatingsByCategory = Review::leftJoin('facilities', 'reviews.facility_id', '=', 'facilities.id') // Menggunakan left join untuk memastikan semua kategori diambil
                                            ->selectRaw('facilities.category, AVG(reviews.rating) as average_rating') // Mengambil kategori dan rata-rata rating
                                            ->groupBy('facilities.category') // Mengelompokkan berdasarkan kategori
                                            ->get(); // Mendapatkan hasilnya


    
        $facilitiesByCategory = Facility::selectRaw('category, COUNT(*) as total')
                                         ->groupBy('category')
                                         ->pluck('total', 'category');

        return view('admin.dashboard', compact(
            'averageRatingsByCategory', 
            'facilitiesByCategory',
            'totalUsers',
            'totalReviews',
            'totalVisits',
            'usersIncrease',
            'reviewsIncrease',
            'visitsIncrease',
            'filter',
            'data',
            'dataVisits',
        ));
    }
    private function calculateGrowthPercentage($today, $yesterday)
    {
        if ($yesterday == 0) {
            return $today > 0 ? 100 : 0; // Jika kemarin 0, dan hari ini lebih besar dari 0, berarti 100% growth
        }

        return (($today - $yesterday) / $yesterday) * 100;
    }
}
