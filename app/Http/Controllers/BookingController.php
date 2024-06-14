<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Homestay;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $query = $request->input('q');

        // if (!empty($query)) {
        //     $booking = Booking::where('name', 'like', '%' . $query . '%')->latest()->paginate(10);
        // } else {
        //     $booking = Booking::latest()->paginate(10);
        // }

        // return view("admin.booking.index", ['booking' => $booking, 'q' => $query]);

        $booking = Booking::latest()->Cari()->paginate(10);

        return view("admin.booking.index", ['booking' => $booking, 'q' => request('query')]);

    }

    // index yang udah baim(in case gak tau kalau aku yang ubah) gubah
    // >>> Bagas: jir, pake watermark -v-)
    // BTW query ubah jadi q lagi
    /*
        public function index()
        {
            $query = request('q');

            $booking = Booking::latest()->cari($query)->paginate(10);

            return view("admin.booking.index", ['booking' => $booking, 'q' => $query]);
        }
    */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.booking.create', ['homestay'=>Homestay::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'notelp' => [
                'required',
                'regex:/^\+62\d+$/'
            ],
            'homestay_id' => 'required|exists:homestays,id',
        ]);

        Booking::create($data);
        return redirect('/admin/booking')->with('success', 'Berhasil menambahkan bookingan baru.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.booking.edit',['booking'=>Booking::find($id), 'homestay'=>Homestay::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'notelp' => [
                'required',
                'regex:/^\+62\d+$/'
            ],
            'homestay_id' => 'required|exists:homestays,id',
        ]);
        $booking = Booking::findOrFail($id);
        $booking->update($data);
        return redirect('/admin/booking')->with('warining', 'Berhasil mengubah bookingan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Booking::findOrFail($id)->delete();
        return redirect('/admin/booking')->with('danger', 'Berhasil menghapus bookingan.');
    }

    // Booking sebagai tamu
    public function formBooking(Request $request)
    {
        return view('frontend.homestay.booking', ['homestay'=>Homestay::findOrFail($request->homestay_id)]);
    }

    // Booking sebagai tamu
    public function booking(Request $request)
    {
        $data=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
            'notelp' => [
                'required',
                'regex:/^\+62\d+$/'
            ],
            'homestay_id' => 'required|exists:homestays,id',
        ]);

        Booking::create($data);
        return redirect('/');
    }

    // approve bookingan
    public function approve(string $id){
        $bookingan=Booking::findOrFail($id);
        if($bookingan->status=='approved'){
            $bookingan->update(['status'=>'canceled']);
            $message = 'Bookingan '.$bookingan->nama.' dibatalkan';
        }else{
            $bookingan->update(['status'=>'approved']);
            $message = 'Bookingan '.$bookingan->nama.' disetujui';
        }
        return redirect('admin/booking')->with('success', $message);
    }
}
