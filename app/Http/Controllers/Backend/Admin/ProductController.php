<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(15);
        return view('backend.admin.product.index',compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        if ($r->isMethod('get')) {
            return view('backend.admin.product.create');
        }else{
            return self::store($r);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'unit' => 'required|in:length,mass,number',
            'rate' => 'required|numeric|min:1',
        ]);

        Product::create([
            'shop_id' => 1,
            'name' => $request->name,
            'unit' => $request->unit,
            'unit_name' => $request->unit_name,
            'rate' => $request->rate,
        ]);


        return redirect(route('admin.product'))->with('success','Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,Request $r)
    {
        if ($r->isMethod('get')) {
            return view('backend.admin.product.edit',compact(['product']));
        }else{
            return self::update($r,$product);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $product)
    {
        $r->validate([
            'name' => 'required|min:3',
            'unit' => 'required|in:length,mass,number',
            'rate' => 'required|numeric|min:1',
        ]);

        $shop_id = Session::get('default_shop') ?? 1;


        $product->update([
            'name' => $r->name,
            'unit' => $r->unit,
            'unit_name' => $r->unit_name,
            'rate' => $r->rate,
        ]);

        return redirect(route('admin.product'))->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return $product;
    }
}
