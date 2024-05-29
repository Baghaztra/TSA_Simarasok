<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Category;
use App\Http\Requests\StoreUMKMRequest;
use App\Http\Requests\UpdateUMKMRequest;

class UMKMController extends Controller
{
    // Display a listing of the resource.

    public function index() {
        $umkm = UMKM::latest()->paginate(10);
        return view("admin.umkm.index", ['umkms' => $umkm]);
    }

    // Show the form for creating a new resources.

    public function create() {
        $umkm = UMKM::all();
        $kategori = Category::all();
        return view('admin.umkm.create')->with(['umkms' => $umkm, 'kategoris' => $kategori]);
    }

    // Store a newly created resource in storage.

    public function store(StoreUMKMRequest $request) {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $umkm  = [
            'name' => $request->name,
            'category_id' => $request->category_id,
        ];

        UMKM::create($umkm);
        return redirect('admin/umkm')->with('success', 'Berhasil menambahkan UMKM baru.');
    }

    public function edit(string $id)
    {
        $umkm = UMKM::findOrFail($id);
        $kategori = Category::all();
        return view('admin.umkm.edit')->with(['umkms' => $umkm, 'kategoris' => $kategori]);
    }

    public function update(UpdateUMKMRequest $request, string $id)
    {
        $umkm = UMKM::findOrFail($id);

        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
        ];
        $umkm->update($data);

        return redirect('admin/umkm')->with('warning', 'Berhasil mengubah data UMKM.');
    }

    public function destroy(string $id)
    {
        $umkm = UMKM::findOrFail($id);

        $umkm->delete();

        return redirect('admin/umkm')->with('danger', 'Berhasil menghapus data UMKM.');
    }
}
