@extends('layouts.backend.layout')

@push('css')

@endpush

@section('content')

<div class="container-fluid">




    <div class="card my-5">
        <div class="card-body">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary float-right">Add Product</a>
            <h2 class="text-center mb-5">All Products Can Be Sell Or Buy</h2>
            {{-- <p class="card-title-desc"> Add <code>.table-sm</code> to make tables more compact by cutting cell padding in
            half.</p> --}}

            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Rate</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($products as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <th>{{$item->name}}</th>
                            <th>{{$item->unit}} <small>({{$item->unit_name}})</small></th>
                            <th>{{$item->rate}} <small>TK</small></th>
                            <th>{{$item->updated_at->format('Y-m-d | h:iA')}}</th>
                            <th>
                                <a href="{{route('admin.product.edit',$item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>


                                </div>
                            </th>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <h2 class="text-danger text-center py-5">No Data</h2>
                            </td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>

            </div>
            {{$products->links()}}
        </div>
    </div>

</div>

@endsection

@push('js')

@endpush
