<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        if (!empty($query)) {
            $produk = Produk::where('name', 'like', '%'.$query.'$')->latest()->paginate(10);
        }else{
            $produk = Produk::latest()->paginate(10);
        }
        return view("admin.produk.index", ['produks' => $produk, 'q'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        return view('admin.produk.create')->with(['produk' => $produk]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request)
    {
       $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'harga' => 'required',
            'umkm_id' => 'required|exists:umkms,id'
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
            $asset->jenis = 'produk';
            $asset->jenis_id = $produk->id;
            $asset->save();
        }
    }
    Produk::create($produk);
    return redirect('admin/produk/'.$umkm_id)->with('success', 'Berhasil menambahkan Produk baru.');
}

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit')->with('produks', $produk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, string $id)
    {
        $produk = Produk::findOrFail($id);

        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'harga' => $request->harga,
            'umkm_id' => $request->umkm_id,
        ];
        $produk->update($data);

        if ($request->hasFile('gambar')) {
            $i = 0;
            foreach($request->file('gambar') as $file) {
                $fileName = time() . $i++ . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets'), $fileName);
                $asset = new Asset();
                $asset->nama = $fileName;
                $asset->tipe = in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png']) ? 'gambar' : 'video';
                $asset->jenis = 'produk';
                $asset->jenis_id = $produk->id;
                $asset->save();
            }
        }

        return redirect('admin/produk/'.$umkm_id)->with('warning', 'Berhasil mengubah data Produk.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrfail($id);

        foreach ($produk->media as $media) {
            if (file_exists(public_path('images/' . $media->nama))) {
                unlink(public_path('images/' . $media->nama));
            }
            $media->delete();
        }

        $produk->delete();

        return redirect('admin/produk/'.$umkm_id)->with('danger', 'Berhasil menghapus data Produk.');
    }
}
