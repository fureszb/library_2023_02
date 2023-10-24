<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index(){
        return Lending::all();
    }

    public function show ($user_id, $copy_id, $start)
    {
        $lending = Lending::where('user_id', $user_id)->where('copy_id', $copy_id)->where('start', $start)->get();
        return $lending[0];
        //return Lending::where('user_id', $user_id)->where('copy_id', $copy_id)->where('start', $start)->get();
    }


    public function destroy($user_id, $copy_id, $start){

        return LendingController::show($user_id, $copy_id, $start)->delete();
    }
    public function update(Request $request, $id){
        $lending = Lending::find($id);
        $lending->user_id = $request->user_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
        $lending->save();
        
    }

    public function store(Request $request){
        $lending = new Lending();
        $lending->user_id = $request->user_id;
        $lending->copy_id = $request->copy_id;
        $lending->start = $request->start;
        $lending->save();
        
    }

    
    //view függvények
    public function listView(){
        $lending = Lending::all();
        return view('lending.list', ['lending' => $lending]);
    }
}
