<?php

namespace App\Http\Controllers\frontent;

use App\Http\Controllers\Controller;
use App\Models\Reciepe;
use App\Models\Category ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class RcpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat =Category::all() ;
        $recps = reciepe::all();
        // dump($recps) ;
        // $recps = Reciepe::orderBy('name', 'asc')->get() ;

        return view("front.recipes" ,["rc_data"=>$recps, "cat_data"=> $cat]) ;
    }

    public function offers()
    {
        $recps = reciepe::all();
        // dump($recps) ;
        $recps = Reciepe::orderBy('name', 'asc')->Limit(6)->get() ;
        return view("front.offers" ,["rc_data"=>$recps]) ;
    }
    public function showbycategory($id)
    {
        // $recipes=Reciepe::where('category_id','=',6);
        // return json_encode($recipes);

        $recipes=DB::table("receipes")->where("category_id",$id)->pluck("name","image");
        return json_encode($recipes);
        // return view ('front.recipes') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reciepe  $reciepe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reciepe = new reciepe ;
        $reciepe = $reciepe->findorfail($id);
        // dump($reciepe) ;
        return view("front.details", ["rc_data"=> $reciepe]);
    }
    public function addTOCart(Request $request,$id){
        $reciepe = new reciepe ;
        $reciepe = $reciepe->findorfail($id);
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($reciepe,$reciepe->id);
        $request->session()->put('cart',$cart);
        // dd($request->session()->get('cart'));

        return redirect()->route('reciepes.index');


    }
    public function getCart(){
        if(!Session::has('cart')){
return view('front.shoppingCart');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view('front.shoppingCart',['reciepe'=>$cart->items,'totalPrice'=>$cart->totalPrice]);

    }
    public function getCheckout()
    {
        if(!Session::has('cart')){
            return view('front.shoppingCart');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $total=$cart->totalPrice;
        return view ('front.checkout',['total'=>$total]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reciepe  $reciepe
     * @return \Illuminate\Http\Response
     */
    public function edit(Reciepe $reciepe)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reciepe  $reciepe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reciepe $reciepe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reciepe  $reciepe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reciepe $reciepe)
    {
        //
    }
}
