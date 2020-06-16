<?php

namespace App\Http\Controllers\Api;

use App\Model\IncAndExp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class DataTableController extends Controller
{
    public function __construct()
    {
            // $this->middleware('auth');
    }
    public function get_incomes()
    {
        $field_id =  1;

        $incomes =
        IncAndExp::where('shop_id',$field_id)
        ->where('type','inc')
        ->where('inc_type','regular')
        ->get();

        // return $incomes;
        return Datatables::of($incomes)
        ->addColumn('total_bill', function ($income) {
            return $income->rate * $income->quantity." ৳" ;
        })
        ->addColumn('title', function ($income) {
            return $income->product ? $income->product->name." - ".$income->product->rate."TK" : $income->title;
        })
        ->editColumn('rate', function ($income) {
            return $income->rate." ৳" ;
        })
        ->addColumn('qty', function ($income) {
            return $income->quantity == 1 ? '<span class="badge badge-danger">Null</span>' : $income->quantity;
        })
        ->addColumn('desc', function ($income) {
            return Str::limit($income->desc,40,'...');
        })
        ->addColumn('due', function ($income) {
            return  $income->totalcost - $income->totalpaid ." ৳" ;
        })
        ->editColumn('created_at', function ($income) {
            return $income->created_at->format('Y-m-d | h:iA');
        })
        ->addColumn('action', function ($income) {
            return '
            <div class="btn-group">
            <a href="'.route('admin.income',$income->id).'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
            <a href="'.route('admin.income.edit',$income->id).'" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
            </div>

            ';
        })
        ->rawColumns(['qty', 'action'])
        ->make(true);
    }
    public function get_irrincomes()
    {
        $field_id =  1;

        $incomes =
        IncAndExp::where('shop_id',$field_id)
        ->where('type','inc')
        ->where('inc_type','irregular')
        ->get();

        // return $incomes;
        return Datatables::of($incomes)
        ->addColumn('total_bill', function ($income) {
            return $income->rate * $income->quantity." ৳" ;
        })
        ->addColumn('title', function ($income) {
            return $income->product ? $income->product->name." - ".$income->product->rate."TK" : $income->title;
        })
        ->editColumn('rate', function ($income) {
            return $income->rate." ৳" ;
        })
        ->addColumn('qty', function ($income) {
            return $income->quantity == 1 ? '<span class="badge badge-danger">Null</span>' : $income->quantity;
        })
        ->addColumn('desc', function ($income) {
            return Str::limit($income->desc,40,'...');
        })
        ->addColumn('due', function ($income) {
            return  $income->totalcost - $income->totalpaid ." ৳" ;
        })
        ->editColumn('created_at', function ($income) {
            return $income->created_at->format('Y-m-d | h:iA');
        })
        ->addColumn('action', function ($income) {
            return '
            <div class="btn-group">
            <a href="'.route('admin.irrincome',$income->id).'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
            <a href="'.route('admin.irrincome.edit',$income->id).'" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
            </div>

            ';
        })
        ->rawColumns(['qty', 'action'])
        ->make(true);
    }




    public function get_expanse()
    {
        $field_id =  1;

        $incomes =
        IncAndExp::where('shop_id',$field_id)
        ->where('type','exp')
        ->where('inc_type','regular')
        ->get();

        // return $incomes;
        return Datatables::of($incomes)
        ->addColumn('total_bill', function ($income) {
            return $income->rate * $income->quantity." ৳" ;
        })
        ->addColumn('title', function ($income) {
            return $income->product ? $income->product->name." - ".$income->product->rate."TK" : $income->title;
        })
        ->editColumn('rate', function ($income) {
            return $income->rate." ৳" ;
        })
        ->addColumn('qty', function ($income) {
            return $income->quantity == 1 ? '<span class="badge badge-danger">Null</span>' : $income->quantity;
        })
        ->addColumn('desc', function ($income) {
            return Str::limit($income->desc,40,'...');
        })
        ->addColumn('due', function ($income) {
            return  $income->totalcost - $income->totalpaid ." ৳" ;
        })
        ->editColumn('created_at', function ($income) {
            return $income->created_at->format('Y-m-d | h:iA');
        })
        ->addColumn('action', function ($income) {
            return '
            <div class="btn-group">
            <a href="'.route('admin.expanse',$income->id).'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
            <a href="'.route('admin.expanse.edit',$income->id).'" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
            </div>

            ';
        })
        ->rawColumns(['qty', 'action'])
        ->make(true);
    }



    public function get_irrexpanse()
    {
        $field_id =  1;

        $incomes =
        IncAndExp::where('shop_id',$field_id)
        ->where('type','exp')
        ->where('inc_type','irregular')
        ->get();

        // return $incomes;
        return Datatables::of($incomes)
        ->addColumn('total_bill', function ($income) {
            return $income->rate * $income->quantity." ৳" ;
        })
        ->addColumn('title', function ($income) {

            return Str::limit( $income->product ? $income->product->name." - ".$income->product->rate."TK" : $income->title,40,'...');
        })
        ->editColumn('rate', function ($income) {
            return $income->rate." ৳" ;
        })
        ->addColumn('qty', function ($income) {
            return $income->quantity == 1 ? '<span class="badge badge-danger">Null</span>' : $income->quantity;
        })
        ->addColumn('desc', function ($income) {
            return Str::limit($income->desc,40,'...');
        })
        ->addColumn('due', function ($income) {
            return  $income->totalcost - $income->totalpaid ." ৳" ;
        })
        ->editColumn('created_at', function ($income) {
            return $income->created_at->format('Y-m-d | h:iA');
        })
        ->addColumn('action', function ($income) {
            return '
            <div class="btn-group">
            <a href="'.route('admin.irrexpanse',$income->id).'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
            <a href="'.route('admin.irrexpanse.edit',$income->id).'" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
            </div>

            ';
        })
        ->rawColumns(['qty', 'action'])
        ->make(true);
    }

}

