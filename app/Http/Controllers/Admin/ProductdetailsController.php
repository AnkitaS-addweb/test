<?php

namespace App\Http\Controllers\Admin;

use App\Productdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductdetailsRequest;
use App\Http\Requests\Admin\UpdateProductdetailsRequest;

class ProductdetailsController extends Controller
{
    /**
     * Display a listing of Productdetail.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {if ($_GATES_$) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('productdetail_delete')) {
                return abort(401);
            }
            $productdetails = Productdetail::onlyTrashed()->get();
        } else {
            $productdetails = Productdetail::all();
        }

        return view('admin.productdetails.index', compact('productdetails'));
    }

    /**
     * Show the form for creating new Productdetail.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {if ($_GATES_$) {
            return abort(401);
        }
        
        $parent_products = \App\Productdetail::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.productdetails.create', compact('parent_products'));
    }

    /**
     * Store a newly created Productdetail in storage.
     *
     * @param  \App\Http\Requests\StoreProductdetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductdetailsRequest $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        $productdetail = Productdetail::create($request->all());



        return redirect()->route('admin.productdetails.index');
    }


    /**
     * Show the form for editing Productdetail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        
        $parent_products = \App\Productdetail::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $productdetail = Productdetail::findOrFail($id);

        return view('admin.productdetails.edit', compact('productdetail', 'parent_products'));
    }

    /**
     * Update Productdetail in storage.
     *
     * @param  \App\Http\Requests\UpdateProductdetailsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductdetailsRequest $request, $id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $productdetail = Productdetail::findOrFail($id);
        $productdetail->update($request->all());



        return redirect()->route('admin.productdetails.index');
    }


    /**
     * Display Productdetail.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        
        $parent_products = \App\Productdetail::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$productdetails = \App\Productdetail::where('parent_product_id', $id)->get();

        $productdetail = Productdetail::findOrFail($id);

        return view('admin.productdetails.show', compact('productdetail', 'productdetails'));
    }


    /**
     * Remove Productdetail from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $productdetail = Productdetail::findOrFail($id);
        $productdetail->delete();

        return redirect()->route('admin.productdetails.index');
    }

    /**
     * Delete all selected Productdetail at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Productdetail::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Productdetail from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $productdetail = Productdetail::onlyTrashed()->findOrFail($id);
        $productdetail->restore();

        return redirect()->route('admin.productdetails.index');
    }

    /**
     * Permanently delete Productdetail from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $productdetail = Productdetail::onlyTrashed()->findOrFail($id);
        $productdetail->forceDelete();

        return redirect()->route('admin.productdetails.index');
    }
}
