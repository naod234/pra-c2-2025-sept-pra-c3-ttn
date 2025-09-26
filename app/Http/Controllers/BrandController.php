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
}
