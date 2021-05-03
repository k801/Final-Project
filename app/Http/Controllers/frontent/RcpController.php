<?php

namespace App\Http\Controllers\frontent;

use App\Http\Controllers\Controller;
use App\Models\Reciepe;
use App\Models\Category ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use App\Models\Cart;
use App\Models\Rating;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RcpController extends Controller
{



    public $module_view_folder;

    public function __construct()
    {
        $this->module_view_folder = 'front.shoppingCart';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat =Category::all() ;
        $recps = reciepe::all();

        $reciepe = new reciepe ;
        // $reciepe = $reciepe->findorfail();
        // $rating=$reciepe->averageRating;
        // $recps = Reciepe::orderBy('name', 'asc')->get() ;

        return view("front.recipes" ,["rc_data"=>$recps, "cat_data"=> $cat]) ;
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
        $rating=$reciepe->averageRating;
        // dd($rating) ;
        // dump($reciepe) ;
        return view("front.details", ["rc_data"=> $reciepe,'rating'=>$rating]);
    }

    public function getRecipesDetails($id)
    {
        $reciepe = new reciepe ;
        $reciepe = $reciepe->findorfail($id);
        $rating=$reciepe->averageRating;
        // dd($rating) ;
        // dump($reciepe) ;
        return view("front.details", ["rc_data"=> $reciepe,'rating'=>$rating]);
    }

  

    function get_rate(Request $request)
    {
    // id of recipe
        $id= $request->id;
// value rate
        $rating=$request->rating;
        $user_id=Auth::id();
        $reciepe = Reciepe::findOrFail($id);
        $count=Rating::where('user_id',$user_id)->where('rateable_id',$id)->get()->count();

      if($count==0)
      {
        $reciepe->rate($rating);

      }else{

        $reciepe->rateOnce($rating);
      }

        return $count;
    }

    public function offers()
    {
        $recps = reciepe::all();
        // dump($recps) ;
        $recps1 = Reciepe::orderBy('evaluation', 'asc')->Limit(4)->get() ;
        $recps2 = Reciepe::orderBy('price', 'desc')->Limit(6)->get() ;
        return view("front.offers" ,["rc_data1"=>$recps1,"rc_data2"=>$recps2]) ;
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
    public function getCart()
    {

        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);

        if (request('id') && request('resourcePath'))
        {
            $payment_status = $this->getPaymentStatus(request('id'), request('resourcePath'));

            if (isset($payment_status['id']))
             {
                 $showSuccessPaymentMessage = true;

                 session()->flash('success','successfull payment');
                }else{
                    $cart=new Cart($oldCart);
                    $showFailPaymentMessage = true;
                    session()->flash('fail','fail payment');

                }

                return view($this->module_view_folder)-> with(['reciepe'=>$cart->items,'totalPrice'=>$cart->totalPrice,'reciepe'=>$cart->items,]);

            }


        // if(!Session::has('cart'))
        // {

        //    return view('front.shoppingCart');
        // }
        // $oldCart=Session::get('cart');
        return view('front.shoppingCart',['reciepe'=>$cart->items,'totalPrice'=>$cart->totalPrice]);

    }





private function getPaymentStatus($id, $resourcepath)
    {
        $url = config('payment.hyperpay.url');
        $url .= $resourcepath;
        $url .= "?entityId=" . config('payment.hyperpay.entity_id');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer ' . config('payment.hyperpay.auth_key')));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, config('payment.hyperpay.production'));// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return json_decode($responseData, true);

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

public function get_recipes($category_id)
{

   $allRecipes=Reciepe::where('category_id',$category_id)->get();

//    $rates= Rating::whe('rateable_id','=',$allRecipes)->get();

// $rating=$allRecipes->averageRating;
   return json_decode($allRecipes);


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
