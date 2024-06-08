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
    public function index(Request $request)
    {
        $query = $request->input('query');
    
        if (!empty($query)) {
            $booking = Booking::where('name', 'like', '%' . $query . '%')->latest()->paginate(10);
        } else {
            $booking = Booking::latest()->paginate(10);
        }
        
        return view("admin.booking.index", ['booking' => $booking, 'query' => $query]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.booking.create')->with(['booking',Booking::all(),'homestay',Homestay::all()]);
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
        ]);

        Booking::create($data);
        return redirect('/booking')->with('success', 'Berhasil menambahkan bookingan baru.');
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
    public function edit(Booking $booking)
    {
        return view('admin.booking.edit')->with(['booking',Booking::all(),'homestay',Homestay::all()]);
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
        ]);
        $booking = Booking::findOrFail($id);
        $booking::update($data);
        return redirect('/booking')->with('warining', 'Berhasil mengubah bookingan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Booking::findOrFail($id)->delete();
        return redirect('booking')->with('danger', 'Berhasil menghapus bookingan.');
    }
}
