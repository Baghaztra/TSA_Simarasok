<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Booking;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\DestinasiPariwisata;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Produk;

class DashbaordController extends Controller
{
    public function index(){
        $bookings = Booking::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                        ->groupBy('month')
                        ->pluck('count', 'month')->all();

        // Daftar bulan
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // Inisialisasi array bookings dengan 0
        $monthlyBookings = array_fill(1, 12, 0);

        // Isi array bookings dengan data dari database
        foreach ($bookings as $month => $count) {
            $monthlyBookings[$month] = $count;
        }

        $dcount =  DestinasiPariwisata::count();
        $pcount =  Post::count();
        $ucount =  Produk::count();
        $hcount =  Homestay::count();
        return view('admin.dashboard')
              ->with(['dcount' => $dcount, 
                      'ucount' => $ucount, 
                      'pcount' => $pcount, 
                      'hcount' => $hcount,
                      'monthlyBookings' => $monthlyBookings, 
                      'months' => $months]);
    }
}
