<?php

namespace App\Http\Controllers\Admin;

use App\Productfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductfilesRequest;
use App\Http\Requests\Admin\UpdateProductfilesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ProductfilesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Productfile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {if ($_GATES_$) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('productfile_delete')) {
                return abort(401);
            }
            $productfiles = Productfile::onlyTrashed()->get();
        } else {
            $productfiles = Productfile::all();
        }

        return view('admin.productfiles.index', compact('productfiles'));
    }

    /**
     * Show the form for creating new Productfile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {if ($_GATES_$) {
            return abort(401);
        }
        return view('admin.productfiles.create');
    }

    /**
     * Store a newly created Productfile in storage.
     *
     * @param  \App\Http\Requests\StoreProductfilesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductfilesRequest $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $productfile = Productfile::create($request->all());



        return redirect()->route('admin.productfiles.index');
    }


    /**
     * Show the form for editing Productfile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $productfile = Productfile::findOrFail($id);

        return view('admin.productfiles.edit', compact('productfile'));
    }

    /**
     * Update Productfile in storage.
     *
     * @param  \App\Http\Requests\UpdateProductfilesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductfilesRequest $request, $id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $productfile = Productfile::findOrFail($id);
        $productfile->update($request->all());



        return redirect()->route('admin.productfiles.index');
    }


    /**
     * Display Productfile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $productfile = Productfile::findOrFail($id);

        return view('admin.productfiles.show', compact('productfile'));
    }


    /**
     * Remove Productfile from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $productfile = Productfile::findOrFail($id);
        $productfile->deletePreservingMedia();

        return redirect()->route('admin.productfiles.index');
    }

    /**
     * Delete all selected Productfile at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Productfile::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }


    /**
     * Restore Productfile from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $productfile = Productfile::onlyTrashed()->findOrFail($id);
        $productfile->restore();

        return redirect()->route('admin.productfiles.index');
    }

    /**
     * Permanently delete Productfile from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $productfile = Productfile::onlyTrashed()->findOrFail($id);
        $productfile->forceDelete();

        return redirect()->route('admin.productfiles.index');
    }
}
