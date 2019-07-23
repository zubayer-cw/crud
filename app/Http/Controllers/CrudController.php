<?php

namespace App\Http\Controllers;

use App\Crud;
use Collective\Html\HtmlServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Crud::get();
        return view('index',compact('product'));
// });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
     $product = new Crud;
     $product->name = $request->name;
     $product->description = $request->description;
     $product->price = $request->price;

     if ($product->save()) {
        session()->flash('success', "Question has been created successfully!");
        return Redirect::to('product');
    } else {
        session()->flash('error', "Question could not be created!");
        return Redirect::to('product/create');
    }

}

    /**
     * Display the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $crud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Crud::find($id);
        return view('edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $product = Crud::find($id);
        // echo "<pre>";
        // print_r($request->id_questions);exit;
        $product->id =  $id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($product->save()) {
            echo "Done";
            session()->flash('success', "Product has been Updated successfully!");
            return Redirect::to('product');
        } else {
            session()->flash('error', "Product could not be Updated!");
            return Redirect::to('product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $product = Crud::find($id)->delete();
        session()->flash('success', "Product has been deleted successfully!");
        return Redirect::to('product');
    }
}
