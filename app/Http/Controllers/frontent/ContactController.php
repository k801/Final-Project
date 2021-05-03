<?php

namespace App\Http\Controllers\frontent;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\contact;
use app\Models\User ;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;

class ContactController extends Controller

{
   
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.contact') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate 
        ([
            'name'=>'required|min:3|max:30' , 
            'email'=>'required|email'  
         ]) ;
         
        $id = Auth::user()->id;
        // $name = Auth::user()->name ;
        $email= Auth::user()->email ;

        dd($id) ;
        // dd($name) ;
        // dd($email) ;

        $contact = new contact ;
        $contact->name = request('name') ;
        $contact->mail = $email ;
        $contact->message = request("message");
        $contact->user_id= $id ;
        $contact->save() ;
    
        // contact::create($request->all());
        // return redirect()->route('front.home') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        //
    }
}
