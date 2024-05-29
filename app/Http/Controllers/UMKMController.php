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
        return view("admin.umkm.index")->with('umkms', $umkm);
    }

    public function authentication() {

    }
}
