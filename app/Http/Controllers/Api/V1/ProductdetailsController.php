<?php

namespace App\Http\Controllers\Api\V1;

use App\Productdetail;
use App\Http\Controllers\Controller;
use App\Http\Resources\Productdetail as ProductdetailResource;
use App\Http\Requests\Admin\StoreProductdetailsRequest;
use App\Http\Requests\Admin\UpdateProductdetailsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Traits\FileUploadTrait;


class ProductdetailsController extends Controller
{
    public function index()
    {
        

        return new ProductdetailResource(Productdetail::with(['parent_product', 'vendor'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('productdetail_view')) {
            return abort(401);
        }

        $productdetail = Productdetail::with(['parent_product', 'vendor'])->findOrFail($id);

        return new ProductdetailResource($productdetail);
    }

    public function store(StoreProductdetailsRequest $request)
    {
        
        if (Gate::denies('productdetail_create')) {
            return abort(401);
        }
        

        $productdetail = Productdetail::create($request->all());

         $productprice = Productprice::create($request->all());

        //$productdetail->vendor()->sync($request->input('vendor', []));
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $file) {
                $productdetail->addMedia($file)->toMediaCollection('image');
            }
        }

        return (new ProductdetailResource($productdetail))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateProductdetailsRequest $request, $id)
    {
        if (Gate::denies('productdetail_edit')) {
            return abort(401);
        }

        $productdetail = Productdetail::findOrFail($id);
        $productdetail->update($request->all());
        $productdetail->vendor()->sync($request->input('vendor', []));
        $filesInfo = explode(',', $request->input('uploaded_image'));
        foreach ($productdetail->getMedia('image') as $file) {
            if (! in_array($file->id, $filesInfo)) {
                $file->delete();
            }
        }
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $file) {
                $productdetail->addMedia($file)->toMediaCollection('image');
            }
        }

        return (new ProductdetailResource($productdetail))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('productdetail_delete')) {
            return abort(401);
        }

        $productdetail = Productdetail::findOrFail($id);
        $productdetail->delete();

        return response(null, 204);
    }
}
