<?php

namespace App\Http\Controllers\frontent;

use App\Http\Controllers\Controller;
use App\Models\Reciepe;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class indexController extends Controller
{
    
    // function index() 
    // {
    //   $data['reciepes']=Reciepe::all();
    //   return view('front.index')->with($data);   
    // }


    public function index()
    {
        $recps1 = reciepe::all();
        $recps2 = reciepe::all();
        // dump($recps) ;
        $recps1 = Reciepe::orderBy('price', 'asc')->Limit(3)->get();
        return view("front.index" ,["rc_data"=>$recps1,"rc_data2"=>$recps2]) ;
    }
   
}
