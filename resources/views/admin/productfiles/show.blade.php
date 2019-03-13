@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.productfiles.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.productfiles.fields.name')</th>
                            <td field-key='name'>@if($productfile->name)<a href="{{ asset(env('UPLOAD_PATH').'/' . $productfile->name) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $productfile->name) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.productfiles.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
