<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

// Ticket 9,10,11 

class ManualController extends Controller
{
   
    public function show($brand_id, $brand_slug, $manual_id)
    {
        $brand = Brand::findOrFail($brand_id);
        $manual = Manual::findOrFail($manual_id);

        
        $manual->increment('views');

        return view('pages.manual_view', [
            "manual" => $manual,
            "brand" => $brand,
        ]);
    }

   
    public function topTen()
    {
        $topManuals = Manual::orderBy('views', 'desc')->take(10)->get();

        return view('manuals.index', compact('topManuals'));
    }

    
    public function topPerBrand()
    {
        $brands = Manual::select('brand')->distinct()->get();
        $results = [];

        foreach ($brands as $brand) {
            $results[$brand->brand] = Manual::where('brand', $brand->brand)
                ->orderBy('views', 'desc')
                ->take(5)
                ->get();
        }

        return view('manuals.top-per-brand', compact('results'));
    }
}
