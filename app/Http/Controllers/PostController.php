<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Post::latest()->paginate(10);
        return view("admin.post.index")->with("beritas", $berita);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $berita = Post::all();
        $kategori = Category::all();
        $author = User::all();
        return view('admin.post.create')->with(["beritas", $berita, 'kategoris' => $kategori, 'authors'=> $author]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi_berita' => 'required',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        
        if ($request->hasFile('gambar')) {
            $images = $request->file('gambar');
            $imageName = time().'.'.$images->getClientOriginalExtension();
            $images->move(public_path('images'), $imageName);
        } else {
            return redirect()->back()->withErrors(['gambar' => 'Gambar tidak valid atau tidak ada.'])->withInput();
        }

        $berita = [
            'judul' => $request->judul,
            'content' => $request->isi_berita,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'gambar' => $imageName,  
            'tanggal_post'=>now()  
        ];

        
        Post::create($berita);
        return redirect('admin/post')->with('success', 'Berhasil menambahkan berita baru.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita = Post::findOrFail($id);
        $kategori = Category::all();
        $author = User::all();
        return view('admin.post.edit')->with(['beritas' => $berita, 'kategoris' => $kategori, 'authors'=> $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $berita = Post::findOrFail($id);
        $validated = $request->validate([
            'judul' => 'required',
            'isi_berita' => 'required',
            'category_id' => 'required|exists:kategoris,id',
            'user_id' => 'required|exists:users,id',
            'gambar' => 'required',
        ]);

        $berita->update($validated);
        return redirect('admin/post')->with('success', 'Berhasil menghapus data berita.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect('dashboard-berita')->with('success', 'Berhasil menghapus data berita.');
    }
}
