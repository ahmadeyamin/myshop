<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Model\IncAndExp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;

class IncExpController extends Controller
{



    public function income(Request $r,$id = 0)
    {
        if ($r->id) {
            return self::show($id);
        }
        $products = Product::all();
        return view('backend.admin.income.index',compact('products'));
    }



    public function irrincome(Request $r,$id = 0)
    {
        if ($r->id) {
            return self::irrshow($id);
        }
        $products = Product::all();
        return view('backend.admin.irrincome.index',compact('products'));
    }



    public function expanse(Request $r,$id = 0)
    {
        if ($r->id) {
            return self::expanseshow($id);
        }
        $products = Product::all();
        return view('backend.admin.expanse.index',compact('products'));
    }



    public function irrexpanse(Request $r,$id = 0)
    {
        if ($r->id) {
            return self::irrexpanseshow($id);
        }
        $products = Product::all();
        return view('backend.admin.irrexpanse.index',compact('products'));
    }

    public function create(Request $r)
    {
        $r->validate([
            'title' => 'nullable|max:200',
            'product' => 'exists:products,id|required_if:title,',
            'status' => 'required',
            'rate' => 'required|numeric|min:1',
            'qty' => 'nullable|numeric|min:1',
        ]);


        IncAndExp::create([
            'shop_id' => 1,
            'product_id' => $r->product ?? null,
            'title' => $r->title ?? null,
            'status' => $r->status,
            'desc' => $r->desc,
            'type' => 'inc',
            'inc_type' => 'regular',
            'quantity' =>$r->has('qty') ? $r->qty : 1,
            'rate' => $r->rate
        ]);

        return redirect(route('admin.income'))->with('success','Income Info Inserted Successfully');
    }

    public function irrcreate(Request $r)
    {

        // return $r;
        $r->validate([
            'title' => 'nullable|max:200',
            'product' => 'exists:products,id|required_if:title,',
            'status' => 'required',
            'rate' => 'required|numeric|min:1',
            'qty' => 'nullable|numeric|min:1',
        ]);


        IncAndExp::create([
            'shop_id' => 1,
            'product_id' => $r->product ?? null,
            'title' => $r->title ?? null,
            'status' => $r->status,
            'desc' => $r->desc,
            'type' => 'inc',
            'inc_type' => 'irregular',
            'quantity' => $r->has('qty') ? $r->qty : 1,
            'rate' => $r->rate
        ]);

        return redirect(route('admin.irrincome'))->with('success','Income Info Inserted Successfully');
    }

    public function expansecreate(Request $r)
    {
        // return $r;
        $r->validate([
            'title' => 'nullable|max:200',
            'product' => 'exists:products,id|required_if:title,',
            'status' => 'required',
            'rate' => 'required|numeric|min:1',
            'qty' => 'nullable|numeric|min:1',
        ]);

        IncAndExp::create([
            'shop_id' => 1,
            'product_id' => $r->product ?? null,
            'title' => $r->title ?? null,
            'status' => $r->status,
            'desc' => $r->desc,
            'type' => 'exp',
            'inc_type' => 'regular',
            'quantity' =>$r->has('qty') ? $r->qty : 1,
            'rate' => $r->rate
        ]);

        return redirect(route('admin.expanse'))->with('success','Expanse Info Inserted Successfully');
    }

    public function irrexpansecreate(Request $r)
    {
        // return $r;
        $r->validate([
            'title' => 'nullable|max:200',
            'product' => 'exists:products,id|required_if:title,',
            'status' => 'required',
            'rate' => 'required|numeric|min:1',
            'qty' => 'nullable|numeric|min:1',
        ]);

        IncAndExp::create([
            'shop_id' => 1,
            'product_id' => $r->product ?? null,
            'title' => $r->title ?? null,
            'status' => $r->status,
            'desc' => $r->desc,
            'type' => 'exp',
            'inc_type' => 'irregular',
            'quantity' =>$r->has('qty') ? $r->qty : 1,
            'rate' => $r->rate
        ]);

        return redirect(route('admin.irrexpanse'))->with('success','Expanse Info Inserted Successfully');
    }



    public function show($id)
    {

        $income = IncAndExp::with('product')->findOrFail($id);

        return view('backend.admin.income.view',compact(['income']));


    }


    public function irrshow($id)
    {

        $income = IncAndExp::with('product')->findOrFail($id);

        return view('backend.admin.irrincome.view',compact(['income']));


    }




    public function expanseshow($id)
    {

        $expanse = IncAndExp::with('product')->findOrFail($id);

        return view('backend.admin.expanse.view',compact(['expanse']));



    }




    public function irrexpanseshow($id)
    {

        $expanse = IncAndExp::with('product')->findOrFail($id);

        return view('backend.admin.irrexpanse.view',compact(['expanse']));


    }



    public function edit($id,Request $r)
    {
        $data = IncAndExp::findOrFail($id);
        $products = Product::all();
        if ($r->isMethod('get')) {
            return view('backend.admin.income.edit',compact(['data','products']));
        }elseif($r->isMethod('put')){
            return self::update($r,$data);
        }
    }



    public function expanseedit($id,Request $r)
    {
        $data = IncAndExp::findOrFail($id);
        $products = Product::all();
        if ($r->isMethod('get')) {
            return view('backend.admin.expanse.edit',compact(['data','products']));
        }elseif($r->isMethod('put')){
            return self::update($r,$data);
        }
    }


    public function update(Request $r, $data)
    {
        $r->validate([
            'title' => 'nullable|max:200',
            'product' => 'exists:products,id|required_if:title,',
            'status' => 'required',
            'rate' => 'required|numeric|min:1',
            'qty' => 'required|numeric|min:1',
        ]);

        $data->update([
            'product_id' => $r->product ?? null,
            'title' => $r->title ?? null,
            'status' => $r->status,
            'desc' => $r->desc,
            'quantity' => $r->qty ?? 1,
            'rate' => $r->rate
        ]);

        return redirect(route('admin.income'))->with('success','Income Info Updated Successfully');
    }



    public function destroy($id)
    {
        return $data = IncAndExp::findOrFail($id);
    }
}
