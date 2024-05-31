<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Asset;
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
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        
        $berita = [
            'judul' => $request->judul,
            'slug' => Post::make_slug($request->judul),
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'status' => $request->has('publish') ? 'publish' : 'draft',
            // 'gambar' => $imageName,  
        ];
        
        Post::create($berita);
        
        if ($request->hasFile('gambar')) {
            $i = 0;
            foreach($request->file('gambar') as $file) {
                $fileName = time().$i++.'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images'), $fileName);
                $asset = new Asset();
                $asset->nama = $fileName;
                if ($file->getClientOriginalExtension()=='jpg') {
                    $asset->tipe = 'gambar';
                }else{
                    $asset->tipe = 'video';
                }
                $asset->jenis = 'berita';
                $asset->jenis_id = Post::latest()->first()->id;
                $asset->save();
            }
        } else {
            return redirect()->back()->withErrors(['gambar' => 'Gambar tidak valid atau tidak ada.'])->withInput();
        }
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
        $post = Post::findOrFail($id);
        $kategori = Category::all();
        $author = User::all();
        return view('admin.post.edit')->with(['post' => $post, 'kategoris' => $kategori, 'authors'=> $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $berita = Post::findOrFail($id);
    
        $data = [
            'judul' => $request->judul,
            'slug' => Post::make_slug($request->judul),
            'content' => $request->content,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'status' => $request->has('publish') ? 'publish' : 'draft',
            // 'gambar' => $imageName,  
        ];
        $berita->update($data);
        
        if ($request->hasFile('gambar')) {
            $i=0;
            foreach($request->file('gambar') as $file) {
                $fileName = time().$i++.'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images'), $fileName);
                $asset = new Asset();
                $asset->nama = $fileName;
                if ($file->getClientOriginalExtension()=='jpg') {
                    $asset->tipe = 'gambar';
                }else{
                    $asset->tipe = 'video';
                }
                $asset->jenis = 'berita';
                $asset->jenis_id = $id;
                $asset->save();
            }
        }
        
        return redirect('admin/post')->with('warning', 'Berhasil mengubah data berita.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $berita = Post::findOrFail($id);

        if ($berita->gambar && file_exists(public_path('images/' . $berita->gambar))) {
            unlink(public_path('images/' . $berita->gambar));
        }

        $berita->delete();

        return redirect('admin/post')->with('danger', 'Berhasil menghapus data berita.');
    }
}
