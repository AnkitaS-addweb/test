<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Productdetail;
use App\Productprice;
use App\Http\Resources\Productdetail as ProductdetailResource;
use App\Http\Resources\Productprice as ProductpriceResource;


class ShopController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProductdetailResource(Productdetail::whereNull('parent_product_id')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductdetailResource(Productdetail::where('parent_product_id',$id)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function addvariation($id, $token)
    {
        $productdetail = Productdetail::with(['parent_product'])->findOrFail($token);
        return new ProductdetailResource($productdetail);
    }

    public function productprice($id)
    {
        $productdetail = Productprice::with(['vendor'])->where('product_id',$id)->get();
        return new ProductdetailResource($productdetail);
    }
}
