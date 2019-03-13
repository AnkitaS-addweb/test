<?php

namespace App\Http\Controllers\Api\V1;

use App\Vendor;
use App\Http\Controllers\Controller;
use App\Http\Resources\Vendor as VendorResource;
use App\Http\Requests\Admin\StoreVendorsRequest;
use App\Http\Requests\Admin\UpdateVendorsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class VendorsController extends Controller
{
    public function index()
    {
        

        return new VendorResource(Vendor::with(['user'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('vendor_view')) {
            return abort(401);
        }

        $vendor = Vendor::with(['user'])->findOrFail($id);

        return new VendorResource($vendor);
    }

    public function store(StoreVendorsRequest $request)
    {
        if (Gate::denies('vendor_create')) {
            return abort(401);
        }

        $vendor = Vendor::create($request->all());
        
        

        return (new VendorResource($vendor))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateVendorsRequest $request, $id)
    {
        if (Gate::denies('vendor_edit')) {
            return abort(401);
        }

        $vendor = Vendor::findOrFail($id);
        $vendor->update($request->all());
        
        
        

        return (new VendorResource($vendor))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('vendor_delete')) {
            return abort(401);
        }

        $vendor = Vendor::findOrFail($id);
        $vendor->delete();

        return response(null, 204);
    }
}
