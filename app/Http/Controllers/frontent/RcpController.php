<?php

namespace App\Http\Controllers\frontent;

use App\Http\Controllers\Controller;
use App\Models\Reciepe;
use App\Models\Category ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
=======
use SebastianBergmann\Environment\Console;
>>>>>>> ea340f5c2e856a82f9a74e7724c17b2f9c44392d

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRecipes($id)
    {
        // $recipes=Reciepe::where('category_id','=',6);
        // return json_encode($recipes);


      $recipes=DB::table("receipes")->where("category_id",6)->pluck("name","description");
        return json_encode($recipes);
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
