<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['orders']=Order::all();
        return view('backend.orders.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['categories']=Order::all();
        return view('backend.orders.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath,$imageName);

        }

        Order::create([

            'name'=>$request->name,
            'ingrediens'=>$request->ingrediens,
            'description'=>$request->description,
            'image'=>$request->image,
            'category_id'=>$request->category_id

            ]);


        session()->flash('success','Reciepe is inserted sucessfully');
        return redirect()->route('reciepes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        $data['order']=$order;
        return view('backend.orders.show')->with($data);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $orders)
    {
        $data['order']=$orders;
        $data['categories']=Order::all();
        return view('backend.orders.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $reciepe)
    {

        $reciepe->update([

            'name'=>$request->name,
            'ingrediens'=>$request->ingrediens,
            'description'=>$request->description,
            'image'=>$request->image,
            'category_id'=>$request->category_id

            ]);

        session()->flash('success','Reciepe is inserted sucessfully');
        return redirect()->route('orders.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
