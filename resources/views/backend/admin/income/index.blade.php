@extends('layouts.backend.layout')


@push('css')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet"
    href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" />

<style>
    table.dataTable thead th.sorting:after,
    table.dataTable thead th.sorting_asc:after,
    table.dataTable thead th.sorting_desc:after {
        position: absolute;
        right: 8px;
        line-height: normal;
        display: block;
        /* font-family: FontAwesome; */
        line-height: inherit;
    }

    table.dataTable thead th.sorting:after {
        content: "\2193";
        color: @twilight;
    }

    table.dataTable thead th.sorting_asc:after {
        content: "↑";
        color: @brand-primary;
    }

    table.dataTable thead th.sorting_desc:after {
        right: 1em;
        content: "↑";
    }
    .form-control:disabled{
        border: 1px solid #ec4561;
        background-color: #333;
        cursor: not-allowed;
    }

</style>
@endpush



@section('content')
<section class="container">
    <div class="mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-body">

                <button type="button" class="btn btn-primary waves-effect waves-light btn btn btn-outline-info rounded-lg shadow border-light float-right" data-toggle="modal"
                    data-target=".bs-example-modal-lg"><i
                    class="fa fa-plus-circle"></i></button>
                <br>
                <div class="card-title h2 text-capitalize text-center">List Of All Regular Income From Site</div>

                <hr>
                <br>

                <div class="table-responsive  table-lg">
                    <table class="table table-hover mb-3  table-bordered" id="orders-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Prudect name</th>
                                <th>Desc</th>
                                <th>Qty</th>
                                <th>Total Bill</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                    </table>


                    <div class="ml-5">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="mt-0 text-center d-block" id="myLargeModalLabel">Add Income Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.income.create')}}" id="form" method="post">
                            <div class="">
                                <input type="checkbox" id="switch3" v-model="form_check" checked switch="bool"/>
                                <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                <br>
                            </div>


                            <div class="form-group" v-if="form_check">
                                <label for="name">Title Of Income<span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{old('title')}}" id="title"
                                    class="form-control rounded" name="title" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted text-capitalize">Title Text</small>
                            </div>

                            <div class="form-group" v-else>
                                <label for="product">Select Product<span class="text-danger">*</span></label>

                                <select class="custom-select rounded" name="product" id="product">
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}} - <small>({{$product->rate}}TK)</small></option>
                                    @endforeach
                                </select>
                                <small id="helpId" class="text-muted text-capitalize">Select Product</small>
                            </div>



                            @csrf
                            @method('put')

                            <div class="form-group my-5">
                                <label for="fstatus">Income Status<span class="text-danger">*</span></label>
                                <select class="custom-select rounded" name="status" id="fstatus" >
                                    <option value="active">Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Rejected</option>
                                    <option selected value="done">Done</option>
                                </select>
                                <small id="helpId" class="text-muted text-capitalize">Your Income Status

                                </small>
                            </div>

                            <div>
                                <input type="checkbox" id="qty_check" name="qty_check" v-model="form_qty_check" switch="bool"/>
                                <label for="qty_check" data-on-label="Yes" data-off-label="No"></label>
                                <br>
                            </div>

                            <div class="form-group my-1">
                                <label for="unit">Quantity<span class="text-danger">*</span> :</label>
                                <input type="number" value="1" :disabled="!form_qty_check" name="qty" id="qty" class="form-control rounded" aria-describedby="helpId">
                                <small id="helpId" class="text-muted text-capitalize">Quantity About Income</small>
                            </div>


                            <div class="form-group my-3">
                                <label for="unit">Rate / Amount (TK) <span class="text-danger">*</span> :</label>
                                <input type="number" step="any" min="1" name="rate" value="{{old('rate')}}" id="rate" class="form-control rounded" placeholder="" aria-describedby="helpId">
                                <small id="helpId" class="text-muted text-capitalize">Rate Or Total Amount For This Product</small>
                            </div>

                            <div class="form-group my-3">
                                <label for="unit">Note About This <span class="text-danger">*</span> :</label>
                            <textarea name="desc" class="form-control" id="desc" cols="30" rows="10">{{old('desc')}}</textarea>
                            </div>
                            <button class="btn btn-outline-warning mt-4 btn-lg border-0 shadow-lg" type="submit"><i
                                    class="fa fa-save"></i>
                                Save Changes</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>


    </div>
</section>
@endsection

@push('js')


<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script>

var app = new Vue({
  el: '#form',
  data: {
    message: 'Hello Vue!',
    form_check : true,
    form_qty_check : false,
  }
})
</script>
<script>
    $(function () {
        $('#orders-table').DataTable({
            processing: true,
            serverSide: true,
            order:  [0, 'desc'] ,
            ajax: "{{route('ajax.get_incomes')}}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },

                {
                    data: 'desc',
                    name: 'desc'
                },{
                    data: 'qty',
                    name: 'qty'
                },
                {
                    data: 'total_bill',
                    name: 'total_bill',
                    className: 'text-danger'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            language: {
                oPaginate: {
                    sNext: '<i class="fa fa-forward"></i>',
                    sPrevious: '<i class="fa fa-backward"></i>',
                    sFirst: '<i class="fa fa-step-backward"></i>',
                    sLast: '<i class="fa fa-step-forward"></i>'
                }
            },

            buttons: [{
                extend: 'print',
                messageTop: 'List Of All Suppliers Supply With Info',
                autoPrint: false,
                className: 'btn btn-primary float-left',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            }],
            dom: 'Bfrtip',
        });
    });

</script>
@endpush
