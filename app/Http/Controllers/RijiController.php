<?php

namespace App\Http\Controllers;

use App\Riji;
use Illuminate\Http\Request;

class RijiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rijis = Riji::orderBy('id','desc')->paginate(2);
        return view('/home/riji',compact('rijis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/home/riji_create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = implode('#',request()->tag);
        $rijis = new Riji;
        $rijis->title = request()->title;
        $rijis->heart = request()->heart;
        $rijis->content = request()->content;
        $rijis->tag = $tag;
        $rijis->save();


        return redirect('/home/riji');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Riji  $riji
     * @return \Illuminate\Http\Response
     */
    public function show(Riji $riji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Riji  $riji
     * @return \Illuminate\Http\Response
     */
    public function edit(Riji $riji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Riji  $riji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Riji $riji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Riji  $riji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Riji $riji)
    {
        //
    }
}
