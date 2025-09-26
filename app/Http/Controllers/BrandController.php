<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Manual;

class BrandController extends Controller
{
    public function show($brand_id, $brand_slug)
    {
        $brand = Brand::findOrFail($brand_id);

        //Ticket 08
        Manual::where('brand_id', $brand_id)->update(['status' => 'active']);

        $manuals = Manual::where('brand_id', $brand_id)->get();

        return view('pages/manual_list', [
            "brand" => $brand,
            "manuals" => $manuals
        ]);
    }

    // ticket 16
    public function byLetter($letter)
    {
        // alle merken die beginnen met die letter
        $brands = Brand::where('name', 'LIKE', $letter . '%')
                        ->orderBy('name')
                        ->get();

        return view('brands.by-letter', compact('brands', 'letter'));
    }
}
