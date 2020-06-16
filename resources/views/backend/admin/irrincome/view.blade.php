@extends('layouts.backend.layout')

@push('css')
    <style>
        .form-control:focus{
            border: 1px solid #999;
    background: #333;
    color: #fff;
        }
    </style>
@endpush

@section('content')
<section class="container">
    <div class="ml-auto mr-auto mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-header">
                Income Get :
                <strong
                    title="{{$income->created_at->diffForHumans()}}">{{$income->created_at->format('Y-m-d | h:iA')}}</strong>


                <span class="float-right" title="{{$income->updated_at->diffForHumans()}}">Last Updated :
                    <strong>{{$income->updated_at->format('Y-m-d | h:iA')}} </strong></span>

            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">

                            <h6 class="mb-3">Income From: <strong>{{$income->product->name ?? $income->title}}</strong></h6>

                        </div>


                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="">ID</th>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th class="">Rate</th>
                                    <th class="">Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="center">{{$income->id}}</td>
                                    <td class=" strong">{{$income->product->name ?? $income->title}}</td>
                                    <td class="">{{$income->quantity}} </td>
                                    <td class="">{{$income->rate}} <small>TK</small> </td>
                                    <td class="">{{(int)$income->totalCost}} <small>TK</small></td>

                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">

                            <div>
                                <h3>Order Description <i class="fa fa-pencil" aria-hidden="true"></i></h3>
                                <hr>
                                {{$income->desc ?? 'Empty'}}
                            </div>
                            <br>

                            <a class="btn btn-outline-info" href="{{route('admin.income.edit',$income->id)}}">Edit
                                Order <i class="fa fa-edit    "></i> </a>
                            <form action="{{route('admin.income.delete',$income->id)}}" id="dl-form" onSubmit="confirmDelete(event)" class="d-inline" method="post">
                                @csrf
                                <button class="btn btn-outline-danger"> <i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                                @method('delete')

                            </form>
                        </div>


                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>


                                    <tr>
                                        <td class="left">
                                            <strong>Total Cost</strong>
                                        </td>
                                        <td class="right">
                                            <strong>{{$income->totalCost}} <small>TK</small></strong>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')


@endpush
