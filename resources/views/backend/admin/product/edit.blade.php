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
    <div class="">
        <br>
        <br>
        <div class="card  border-0 shadow rounded">
            <div class="card-body ">

                <h1 class=" h1 text-capitalize text-center">Edit This Product</h1>
                <hr>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-8 m-auto">
                        <form action="{{route('admin.product.edit',$product->id)}}" method="post">
                            <div class="form-group">
                                <label for="name">Name OF Product</label>
                                <input type="text" name="name" id="name" value="{{$product->name}}"
                                    class="form-control rounded" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted text-capitalize">Your Product Name</small>
                            </div>


                            @csrf
                            @method('put')
                            <div class="form-group my-5">
                                <label for="unit">Unit OF Product</label>
                                <select class="custom-select rounded" name="unit" id="unit">
                                    <option @if($product->unit == 'number') selected @endif value="number">Number</option>
                                    <option @if($product->unit == 'mass') selected @endif value="mass">Weight</option>
                                    <option @if($product->unit == 'length') selected @endif  value="length">Length</option>
                                </select>
                                <small id="helpId" class="text-muted text-capitalize">Your Product unit</small>
                            </div>

                            <div class="form-group my-5">
                                <label for="unit">Product Unit Name <span class="text-danger">*</span> :</label>
                                <input type="text"  name="unit_name" id="unit_name" value="{{$product->unit_name}}" class="form-control rounded" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted text-capitalize">Name Of Product Unit</small>
                            </div>


                            <div class="form-group my-3">
                                <label for="unit">Product Rate / Pic (TK) <span class="text-danger">*</span> :</label>
                                <input type="number" step="any" min="1" name="rate" id="rate" value="{{$product->rate}}" class="form-control rounded" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted text-capitalize">Rate Of Every Piece For This Product</small>
                            </div>


                            <button class="btn btn-outline-warning mt-4 btn-lg border-0 shadow-lg" type="submit"><i
                                    class="fa fa-save"></i>
                                Update Changes</button>
                        </form>

                        <form action="{{route('admin.product.delete',$product->id)}}" onSubmit="if(!confirm('Are You Sure To Delete This ?')){return false;}" class="d-inline" method="post">
                            @csrf
                            <button class="btn btn-danger float-right"> <i class="fa fa-trash" aria-hidden="true"></i></button>
                            @method('delete')

                        </form>

                    </div>
                </div>

            </div>
        </div>




    </div>
</section>
@endsection

@push('js')

@endpush
