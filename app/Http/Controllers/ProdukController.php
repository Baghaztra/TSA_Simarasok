<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Produk;
use App\Models\UMKM;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProdukRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $produk = Produk::latest()->cari()->where('umkm_id', request('id'))->paginate(10);
        $umkm = UMKM::where('id', request('id'))->first();

        return view("admin.produk.index", ['produks' => $produk, 'umkms' => $umkm, 'q' => request('q')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $produk = Produk::all();
        $kategori = Category::all();
        $umkm = UMKM::where('id', request('umkm_id'))->first();
        return view('admin.produk.create')->with(['produks' => $produk, 'kategoris' => $kategori, 'umkms'=> $umkm]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request)
    {
       $validate = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'harga' => 'required',
            'umkm_id' => 'required|exists:umkms,id',
            'category_id' => 'required|exists:categories,id',
       ]);
       $produk = Produk::create($validate);

       if ($request->hasFile('gambar')) {
            $i = 0;
            foreach($request->file('gambar') as $file) {
                $fileName = time() . $i . '.' . $file->getClientOriginalExtension();
                $i++;
                $file->move(public_path('media'), $fileName);
                $asset = new Asset();
                $asset->nama = $fileName;
                $asset->tipe = in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png']) ? 'gambar' : 'video';
                $asset->jenis = 'produk';
                $asset->jenis_id = $produk->id;
                $asset->save();
            }
        }
        return redirect('admin/produk?id='.$request->umkm_id)->with(['success' => 'Berhasil menambahkan Produk baru.']);
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
        $kategori = Category::All();
        return view('admin.produk.edit')->with(['produks' => $produk, 'kategoris' => $kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);

        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'harga' => $request->harga,
            'umkm_id' => $request->umkm_id,
            'category_id' => $request->category_id,
        ];
        $produk->update($data);

        if ($request->hasFile('gambar')) {
            $i = 0;
            foreach($request->file('gambar') as $file) {
                $fileName = time() . $i++ . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('media'), $fileName);
                $asset = new Asset();
                $asset->nama = $fileName;
                $asset->tipe = in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png']) ? 'gambar' : 'video';
                $asset->jenis = 'produk';
                $asset->jenis_id = $produk->id;
                $asset->save();
            }
        }
        return redirect('admin/produk?id='.$request->umkm_id)->with('warning', 'Berhasil mengubah data Produk.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrfail($id);
        foreach ($produk->media as $media) {
            if (file_exists(public_path('media/' . $media->nama))) {
                unlink(public_path('media/' . $media->nama));
            }
            $media->delete();
        }
        $back = $produk->umkm_id;
        $produk->delete();

        return redirect('admin/produk?id='.$back)->with('danger', 'Berhasil menghapus data Produk.');
    }

    public function catcreate(Request $request) {
        return view('admin.produk.catcreate',['categories'=>Category::all(), 'umkm_id' => $request->umkm_id]);
    }

    public function strcreate(Request $request) {
        $validated = $request->validate([
            'name'=>'required|unique:categories',
        ],[
            'name'=>'Nama kategori tidak boleh sama dengan yang telah ada',
        ]);
        Category::create($validated);
        return redirect('admin/produk/create?umkm_id='.$request->umkm_id);
    }
}
