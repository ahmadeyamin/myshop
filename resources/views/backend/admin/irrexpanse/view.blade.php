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
                Expanse Get :
                <strong
                    title="{{$expanse->created_at->diffForHumans()}}">{{$expanse->created_at->format('Y-m-d | h:iA')}}</strong>


                <span class="float-right" title="{{$expanse->updated_at->diffForHumans()}}">Last Updated :
                    <strong>{{$expanse->updated_at->format('Y-m-d | h:iA')}} </strong></span>

            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">

                            <h6 class="mb-3">Expanse Source: <strong>{{$expanse->product ? $expanse->product->name ." - ". $expanse->product->rate."TK" : $expanse->title}}</strong></h6>

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
                                    <td class="center">{{$expanse->id}}</td>
                                    <td class=" strong">{{$expanse->product->name ?? $expanse->title}}</td>
                                    <td class="">{{$expanse->quantity}} </td>
                                    <td class="">{{$expanse->rate}} <small>TK</small> </td>
                                    <td class="">{{(int)$expanse->totalCost}} <small>TK</small></td>

                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">

                            <div>
                                <h3>Order Description <i class="fa fa-pencil" aria-hidden="true"></i></h3>
                                <hr>
                                {{$expanse->desc ?? 'Empty'}}
                            </div>
                            <br>

                            <a class="btn btn-outline-info" href="{{route('admin.income.edit',$expanse->id)}}">Edit
                                Order <i class="fa fa-edit    "></i> </a>
                            <form action="{{route('admin.income.delete',$expanse->id)}}" id="dl-form" onSubmit="confirmDelete(event)" class="d-inline" method="post">
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
                                            <strong>{{$expanse->totalCost}} <small>TK</small></strong>
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
