<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\DestinasiPariwisata;
use App\Http\Requests\StoreDestinasiPariwisataRequest;
use App\Http\Requests\UpdateDestinasiPariwisataRequest;
use Illuminate\Http\Request;

class DestinasiPariwisataController extends Controller
{
    // Display a listing of the resource.

    public function index(Request $request) {
        $query = $request->input('q');

        if (!empty($query)) {
            $destinasi = DestinasiPariwisata::where("name", "like", "%" . $query . '%')->latest()->paginate(10);;
        } else {
            $destinasi = DestinasiPariwisata::latest()->paginate(10);
        }
        return view("admin.destinasipariwisata.index", ['destinasis' => $destinasi, 'q' => $query]);
    }

    // Ini untuk index nya.. BTW name dari search nya ubah jadi q aja, biar pendek GET nya
    /*
        public function index() {
            $query = request('q');

            $destinasi = DestinasiPariwisata::latest()->cari($query)->paginate(10);

            return view("admin.destinasipariwisata.index", ['destinasis' => $destinasi, 'q' => $query]);
        }
    */

    // Show the form for creating a new resources.

    public function create() {
        $destinasi = DestinasiPariwisata::all();
        return view('admin.destinasipariwisata.create')->with('destinasis', $destinasi);
    }

    // Store a newly created resource in storage.

    public function store(StoreDestinasiPariwisataRequest $request) {
        $data=$request->validate([
            'name' => 'required',
            'desc' => 'required',
            'harga' => 'required|numeric',
            'notelp' => [
                'required',
                'regex:/^\+62\d+$/'
            ],
            'lokasi' => [
                'required',
                'regex:/^(https:\/\/www\.google\.com\/maps\/|https:\/\/maps\.app\.goo\.gl\/)/'
            ],
        ], [
            'name.required' => 'Nama destinasi harus diisi.',
            'desc.required' => 'Deskripsi harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'notelp.required' => 'Nomor telepon harus diisi.',
            'notelp.regex' => 'Nomor telepon harus diawali dengan +62 dan hanya berisi angka tanpa spasi.',
            'lokasi.required' => 'Lokasi harus diisi.',
            'lokasi.regex' => 'Lokasi harus diawali dengan https://www.google.com/maps/ atau https://maps.app.goo.gl/.'
        ]);

        $destinasi = DestinasiPariwisata::create($data);

        if ($request->hasFile('gambar')) {
            $i = 0;
            foreach($request->file('gambar') as $file) {
                $fileName = time() . $i . '.' . $file->getClientOriginalExtension();
                $i++;
                $file->move(public_path('media'), $fileName);
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

        $data = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'harga' => 'required|numeric',
            'notelp' => [
                'required',
                'regex:/^\+62\d+$/'
            ],
            'lokasi' => [
                'required',
                'regex:/^(https:\/\/www\.google\.com\/maps\/|https:\/\/maps\.)/'
            ],
        ], [
            'name.required' => 'Nama destinasi harus diisi.',
            'desc.required' => 'Deskripsi harus diisi.',
            'harga.required' => 'Harga harus diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'notelp.required' => 'Nomor telepon harus diisi.',
            'notelp.regex' => 'Nomor telepon harus diawali dengan +62 dan hanya berisi angka tanpa spasi.',
            'lokasi.required' => 'Lokasi harus diisi.',
            'lokasi.regex' => 'Lokasi harus diawali dengan https://www.google.com/maps/ atau https://maps.app.goo.gl/.'
        ]);

        $destinasi->update($data);

        if ($request->hasFile('gambar')) {
            $i = 0;
            foreach($request->file('gambar') as $file) {
                $fileName = time() . $i++ . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('media'), $fileName);
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
            if (file_exists(public_path('media/' . $media->nama))) {
                unlink(public_path('media/' . $media->nama));
            }
            $media->delete();
        }

        $destinasi->delete();

        return redirect('admin/destinasipariwisata')->with('danger', 'Berhasil menghapus data Destinasi Pariwisata.');
    }
}
