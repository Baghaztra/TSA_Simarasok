<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Booking;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\DestinasiPariwisata;
use App\Http\Controllers\Controller;

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
        $ucount =  UMKM::count();
        $hcount =  Homestay::count();
        return view('admin.dashboard')
              ->with(['dcount' => $dcount, 
                      'ucount' => $ucount, 
                      'hcount' => $hcount,
                      'monthlyBookings' => $monthlyBookings, 
                      'months' => $months]);
    }
}
