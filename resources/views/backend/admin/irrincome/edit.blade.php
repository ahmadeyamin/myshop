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

                <h1 class=" h1 text-capitalize text-center">Add New Product</h1>
                <hr>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-md-8 m-auto">
                        <form action="{{route('admin.income.edit',$data->id)}}" id="form" method="post">
                            <div class="">
                                <input type="checkbox" id="switch3" v-model="form_check" @if($data->product_id) checked @endif switch="bool"/>
                                <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                <br>
                            </div>


                            <div class="form-group" v-if="form_check">
                                <label for="name">Title Of Income<span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{$data->title}}" id="title"
                                    class="form-control rounded" name="title" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted text-capitalize">Title Text</small>
                            </div>

                            <div class="form-group" v-else>
                                <label for="product">Select Product<span class="text-danger">*</span></label>

                                <select class="custom-select rounded" name="product" id="product">

                                    <option value="">---Select---</option>
                                    @foreach ($products as $product)
                                <option @if($data->product_id == $product->id) selected @endif value="{{$product->id}}">{{$product->name}} <small>({{$product->rate}}TK)</small></option>
                                    @endforeach
                                </select>
                                <small id="helpId" class="text-muted text-capitalize">Select Product</small>
                            </div>



                            @csrf
                            @method('put')

                            <div class="form-group my-5">
                                <label for="fstatus">Income Status<span class="text-danger">*</span></label>
                                <select class="custom-select rounded" name="status" id="fstatus" >
                                    <option @if($product->status == 'active') selected @endif  value="active">Active</option>
                                    <option @if($product->status == 'pending') selected @endif  value="pending">Pending</option>
                                    <option @if($product->status == 'rejected') selected @endif  value="rejected">Rejected</option>
                                    <option @if($product->status == 'done') selected @endif  value="done">Done</option>
                                </select>
                                <small id="helpId" class="text-muted text-capitalize">Your Income Status

                                </small>
                            </div>

                            <div class="form-group my-5">
                                <label for="unit">Quantity<span class="text-danger">*</span> :</label>
                                <input type="number" value="1" value="{{$data->qty}}" name="qty" id="qty" class="form-control rounded" aria-describedby="helpId">
                                <small id="helpId" class="text-muted text-capitalize">Quantity About Income</small>
                            </div>


                            <div class="form-group my-3">
                                <label for="unit">Rate / Amount (TK) <span class="text-danger">*</span> :</label>
                                <input type="number" step="any" min="1" name="rate" value="{{$data->rate}}" id="rate" class="form-control rounded" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted text-capitalize">Rate Or Total Amount For This Product</small>
                            </div>

                            <div class="form-group my-3">
                                <label for="unit">Note About This <span class="text-danger">*</span> :</label>
                            <textarea name="desc" class="form-control" id="desc" cols="30" rows="10">{{$data->desc}}</textarea>
                            </div>
                            <button class="btn btn-outline-warning mt-4 btn-lg border-0 shadow-lg" type="submit"><i
                                    class="fa fa-save"></i>
                                Save Changes</button>
                        </form>

                        <form action="{{route('admin.income.delete',$data->id)}}" onSubmit="if(!confirm('Are You Sure To Delete This ?')){return false;}" class="d-inline" method="post">
                            @csrf
                            <button class="btn btn-danger float-right"> <i class="fa fa-trash"
                                    aria-hidden="true"></i></button>
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
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script>

var app = new Vue({
  el: '#form',
  data: {
    message: 'Hello Vue!',
    form_check : {{$data->product_id ? 'false' : 'true'}},
  }
})
</script>
@endpush
