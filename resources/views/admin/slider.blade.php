@extends('layouts.admin')
@section('slider')
active
@endsection

@section('content')
<div class="col-lg-12">
    @if (session()->has('success'))
    <div class="alert alert-success">
        <p>{{ session()->get('success') }}</p>
    </div>

    @endif
    <div class="card">
        <div class="card-header bg-teal text-light">
            <a href="{{ route('admin.slider_add') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Add New</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Heading</th>
                        <th>Button</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                 @forelse ($data as $key => $item)
                 <tr>
                    <th>{{ $data->firstItem()+$key }}</th>
                    <th style="width: 400px"><img class="w-75" src="{{ asset('uploads/slider') }}/{{ $item->img }}" alt="{{ $item->img }}"></th>
                    <th>{{ $item->title }}</th>
                    <th>{{ $item->heading }}</th>
                    <th>{{ $item->btn_text }}</th>

                    <th><div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ url('admin/slider_delete') }}/{{ $item->id }}" class="btn btn-danger pd-x-25 "><i class="fa fa-trash"></i></a>
                        <a href="{{ url('admin/slider_edit') }}/{{ $item->id }}" class="btn btn-warning pd-x-25"><i class="fa fa-edit"></i></a>
                        <a href="{{ url('admin/slider_action') }}/{{ $item->id }}" class="btn btn-teal pd-x-25"><i class="fa fa-eye{{ $item->action == 2 ? "-slash" : "" }}"></i></a>
                      </div>
                    </th>
                </tr>
                 @empty
                 <tr>
                    <th colspan="50">No Data To Show</th>
                </tr>
                 @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
