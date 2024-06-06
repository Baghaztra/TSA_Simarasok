<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        if (!empty($query)) {
            $kategori = Category::where("name", "like", "%" . $query . '%')->latest()->paginate(10);;
        } else {
            $kategori = Category::latest()->paginate(10);
        }
        return view("admin.category.index",['kategoris'=>$kategori, 'q'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create',['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validate([
            'name'=>'required',
        ]);
        Category::create($validated);
        return redirect('admin/category')->with('success','Kategori Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.category.edit',['category'=>Category::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $validated = $request->validate([
            'name'=>'required',
        ]);
        Category::where('id',$id)->update($validated);
        return redirect('admin/category')->with('warning','Kategori Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect('admin/category')->with('danger','Kategori Berhasil Dihapus');
    }
}
