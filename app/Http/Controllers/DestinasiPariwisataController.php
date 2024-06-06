<?php

namespace App\Http\Controllers;

use App\Models\Asset;
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

        $destinasi = DestinasiPariwisata::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'harga' => $request->harga,
            'notelp' => $request->notelp,
        ]);

        if ($request->hasFile('gambar')) {
            $i = 0;
            foreach($request->file('gambar') as $file) {
                $fileName = time() . $i . '.' . $file->getClientOriginalExtension();
                $i++;
                $file->move(public_path('assets'), $fileName);
                $asset = new Asset();
                $asset->nama = $fileName;
                $asset->tipe = in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png']) ? 'gambar' : 'video';
                $asset->jenis = 'destinasi';
                $asset->jenis_id = $destinasi->id;
                $asset->save();
            }
        } 

        // DestinasiPariwisata::create($destinasi);
        return redirect('admin/destinasipariwisata')->with('success', 'Berhasil menambahkan Destinasi Pariwisata baru.');
    }

    public function edit(string $id){
        $destinasi = DestinasiPariwisata::findOrFail($id);
        return view('admin.destinasipariwisata.edit')->with('destinasis', $destinasi);
    }

    public function update(UpdateDestinasiPariwisataRequest $request, string $id){
        $destinasi = DestinasiPariwisata::findOrFail($id);

        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'harga' => $request->harga,
            'notelp' => $request->notelp,
        ];
        $destinasi->update($data);

        if ($request->hasFile('gambar')) {
            $i = 0;
            foreach($request->file('gambar') as $file) {
                $fileName = time() . $i++ . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets'), $fileName);
                $asset = new Asset();
                $asset->nama = $fileName;
                $asset->tipe = in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png']) ? 'gambar' : 'video';
                $asset->jenis = 'destinasi';
                $asset->jenis_id = $destinasi->id;
                $asset->save();
            }
        }

        return redirect('admin/destinasipariwisata')->with('warning', 'Berhasil mengubah data Destinasi Pariwisata.');
    }

    public function destroy(string $id){
        $destinasi = DestinasiPariwisata::findOrFail($id);

        foreach ($destinasi->media as $media) {
            if (file_exists(public_path('assets/' . $media->nama))) {
                unlink(public_path('assets/' . $media->nama));
            }
            $media->delete();
        }

        $destinasi->delete();

        return redirect('admin/destinasipariwisata')->with('danger', 'Berhasil menghapus data Destinasi Pariwisata.');
    }
}
