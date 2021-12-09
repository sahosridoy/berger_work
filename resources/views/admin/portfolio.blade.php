@extends('layouts.admin')
@section('portfolio')
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
            All Item
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                 @forelse ($data as $key => $item)
                 <tr>
                    <th>{{ $data->firstItem()+$key }}</th>
                    <th><img class="w-25" src="{{ asset('uploads/portfolio') }}/{{ $item->img }}" alt="{{ $item->img }}"></th>
                    <th>{{ $item->title }}</th>
                    <th><div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ url('portfolio_edit') }}/{{ $item->id }}" class="btn btn-warning pd-x-25"><i class="fa fa-edit"></i></a>
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