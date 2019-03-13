<?php

namespace App\Http\Controllers\Api\V1;

use App\Productprice;
use App\Http\Controllers\Controller;
use App\Http\Resources\Productprice as ProductpriceResource;
use App\Http\Requests\Admin\StoreProductpricesRequest;
use App\Http\Requests\Admin\UpdateProductpricesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class ProductpricesController extends Controller
{
    public function index()
    {
        

        return new ProductpriceResource(Productprice::with(['vendor', 'product'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('productprice_view')) {
            return abort(401);
        }

        $productprice = Productprice::with(['vendor', 'product'])->findOrFail($id);

        return new ProductpriceResource($productprice);
    }

    public function store(StoreProductpricesRequest $request)
    {
        if (Gate::denies('productprice_create')) {
            return abort(401);
        }

        $productprice = Productprice::create($request->all());
        
        

        return (new ProductpriceResource($productprice))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateProductpricesRequest $request, $id)
    {
        if (Gate::denies('productprice_edit')) {
            return abort(401);
        }

        $productprice = Productprice::findOrFail($id);
        $productprice->update($request->all());
        
        
        

        return (new ProductpriceResource($productprice))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('productprice_delete')) {
            return abort(401);
        }

        $productprice = Productprice::findOrFail($id);
        $productprice->delete();

        return response(null, 204);
    }
}
