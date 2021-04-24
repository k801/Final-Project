<?php

namespace App\Http\Controllers\frontent;

use App\Http\Controllers\Controller;
use App\Models\Reciepe;
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
        $recps = reciepe::all();
        // dump($recps) ;
        return view("front.index" ,["rc_data"=>$recps]) ;
    }
    
   

}
