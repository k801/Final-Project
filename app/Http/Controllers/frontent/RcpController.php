<?php

namespace App\Http\Controllers\frontent;

use App\Http\Controllers\Controller;
use App\Models\Reciepe;
use App\Models\Category ;
use App\Models\Order ;
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
        return view("front.recipes" ,["rc_data"=>$recps, "cat_data"=> $cat]) ;
    }


   
    public function offers()
    {
        // $recps = reciepe::all();
        // dump($recps) ;
        $recps1 = Reciepe::orderBy('evaluation', 'asc')->Limit(6)->get() ;
        $recps2 = Reciepe::orderBy('price', 'desc')->Limit(9)->get() ;
        return view("front.offers" ,["rc_data1"=>$recps1,"rc_data2"=>$recps2]) ;
    }
    public function show($id)
    {
        $reciepe = new reciepe ;
        $reciepe = $reciepe->findorfail($id);
        $rating=$reciepe->averageRating;
        // dd($rating) ;
        // dump($reciepe) ;
        return view("front.details", ["rc_data"=> $reciepe,'rating'=>$rating]);
    }

    public function showbycategory($id)
    {
        // $recipes=Reciepe::where('category_id','=',6);
        // return json_encode($recipes);

        $recipes=DB::table("receipes")->where("category_id",$id)->pluck("name","image");
        return json_encode($recipes);
        // return view ('front.recipes') ;
    }


    public function get_recipes($category_id)
    {

        $allRecipes=Reciepe::where('category_id',$category_id)->get();

        //    $rates= Rating::whe('rateable_id','=',$allRecipes)->get();


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

}

    public function getReduceByOne($id)
    {
    $reciepe = new reciepe ;
     $reciepe = $reciepe->findorfail($id);
    $oldCart=Session::has('cart')?Session::get('cart'):null;
    $cart=new Cart($oldCart);
    $cart->reduceByOne($id);
    if(count($cart->items)>0){
        Session::put('cart',$cart);
    }else{
        Session::forget('cart');
    }
    return redirect()->route('receipes.shoppingCart');
    }


    public function getRemoveItem($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }

        return redirect()->route('receipes.shoppingCart');
    }
    
   
    public function addTOCart(Request $request,$id){
        $reciepe = new reciepe ;
        $reciepe = $reciepe->findorfail($id);
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($reciepe,$reciepe->id);
        $request->session()->put('cart',$cart);
        // dd($request->session()->get('cart'));

        return redirect()->route('receipes.shoppingCart');
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

                return view($this->module_view_folder)-> with(['reciepe'=>$cart->items,'totalPrice'=>$cart->totalPrice,'reciepe'=>$cart->items]);

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

    public function getCash(Request $request)
    {

        if(!Session::has('cart'))
        {
            return view('front.shoppingCart');
        }
        $oldCart=Session::get('cart');

        
        $cart=new Cart($oldCart);
        $order=new order();
        // dd($oldCart->items);
        $items =[];
        foreach($oldCart->items as $id => $item)
        {
                    // $items[] = ['receipe_id' => $id , 'receipe name' => $item['item']->name 
                    //             , 'count receipes'=>$item['qty'] 
                    //             ,  'price receipes ' =>$item['item']->price ] ;
                    $items[] =['receipe name' => $item['item']->name  ,
                                 'count'=>$item['qty'] ];
                                
        }
        // dd($items) ;
        $order->totalprice=json_encode($cart->totalPrice,JSON_PRETTY_PRINT,20);
        $order->countreceipes=json_encode($cart->totalQty,JSON_PRETTY_PRINT,20);
        $order->orderdetails=json_encode($items,JSON_PRETTY_PRINT,20);
        $order->username = Auth::user()->name;
        $order->useremail =Auth::user()->email;
        // dd($order->cart);
        Auth::user()->orders()->save($order);
        sleep(1);
        return redirect()->route('receipes.shoppingCart');
    }
}
