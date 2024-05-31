<?php

namespace App\Http\Controllers;

use App\Models\DestinasiPariwisata;
use App\Http\Requests\StoreDestinasiPariwisataRequest;
use App\Http\Requests\UpdateDestinasiPariwisataRequest;

class DestinasiPariwisataController extends Controller
{
    // Display a listing of the resource.

    public function index() {
        $destinasi = DestinasiPariwisata::latest()->paginate(10);
        return view("admin.destinasipariwisata.index", ['destinasis' => $destinasi]);
    }

    // Show the form for creating a new resources.

    public function create() {
        $destinasi = DestinasiPariwisata::all();
        return view('admin.destinasipariwisata.create')->with('destinasis', $destinasi);
    }

    // Store a newly created resource in storage.

    public function store(StoreDestinasiPariwisataRequest $request) {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'harga' => 'required',
        ]);

        $destinasi  = [
            'name' => $request->name,
            'desc' => $request->desc,
            'harga' => $request->harga,
        ];

        DestinasiPariwisata::create($destinasi);
        return redirect('admin/destinasipariwisata')->with('success', 'Berhasil menambahkan Destinasi Pariwisata baru.');
    }

    public function edit(string $id)
    {
        $destinasi = DestinasiPariwisata::findOrFail($id);
        return view('admin.destinasipariwisata.edit')->with('destinasis', $destinasi);
    }

    public function update(UpdateDestinasiPariwisataRequest $request, string $id)
    {
        $destinasi = DestinasiPariwisata::findOrFail($id);

        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'harga' => $request->harga,
        ];
        $destinasi->update($data);

        return redirect('admin/destinasipariwisata')->with('warning', 'Berhasil mengubah data Destinasi Pariwisata.');
    }

    public function destroy(string $id)
    {
        $destinasi = DestinasiPariwisata::findOrFail($id);

        $destinasi->delete();

        return redirect('admin/destinasipariwisata')->with('danger', 'Berhasil menghapus data Destinasi Pariwisata.');
    }
}
