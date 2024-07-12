<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\Booking;
use App\Models\Homestay;
use Illuminate\Http\Request;
use App\Models\DestinasiPariwisata;
use App\Http\Controllers\Controller;
use App\Models\PageVisit;
use App\Models\Post;
use App\Models\Produk;

class DashbaordController extends Controller
{
    public function index(){
        $dcount =  DestinasiPariwisata::count();
        $pcount =  Post::count();
        $ucount =  Produk::count();
        $hcount =  Homestay::count();

        $maxvd = DestinasiPariwisata::latest()->first();
        $maxvd->visits = 0;
        foreach (DestinasiPariwisata::all() as $item) {
            $path = "list-destinasi/{$item->id}";
            $visits = PageVisit::where('path', $path)->first()->visits ?? 0;
            $item->visits = $visits;
            if ( $item->visits > $maxvd->visits ){
                $maxvd = $item;
            }
        }
        $maxvh = Homestay::latest()->first();
        $maxvh->visits = 0;
        foreach (Homestay::all() as $item) {
            $path = "list-homestay/{$item->id}";
            $visits = PageVisit::where('path', $path)->first()->visits ?? 0;
            $item->visits = $visits;
            if ( $item->visits > $maxvh->visits ){
                $maxvh = $item;
            }
        }
        $maxvp = Post::latest()->first();
        $maxvp->visits = 0;
        foreach (Post::all() as $item) {
            $path = "list-post/{$item->slug}";
            $visits = PageVisit::where('path', $path)->first()->visits ?? 0;
            $item->visits = $visits;
            if ( $item->visits > $maxvp->visits ){
                $maxvp = $item;
            }
        }
        $maxvu = Produk::latest()->first();
        $maxvu->visits = 0;
        foreach (Produk::all() as $item) {
            $path = "produk/{$item->id}";
            $visits = PageVisit::where('path', $path)->first()->visits ?? 0;
            $item->visits = $visits;
            if ( $item->visits > $maxvu->visits ){
                $maxvu = $item;
            }
        }

        return view('admin.dashboard',
            compact('dcount','pcount','ucount','hcount','maxvd','maxvh','maxvp','maxvu'));
    }
}
