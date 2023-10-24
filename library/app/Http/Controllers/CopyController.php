<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function index(){
        return Copy::all();
    }

    public function show($id){
        return Copy::find($id);
    }

    public function destroy($id){
        Copy::find($id)->delete();
        //még nem létezik... most már igen
        return redirect('/copy/list');
    }

    public function update(Request $request, $id){
        $copy = Copy::find($id);
        $copy->publication = $request->publication;
        $copy->book_id = $request->book_id;
        $copy->hardcovered = $request->hardcovered;
        $copy->status = $request->status;
        $copy->save();
        //még nem létezik...
        return redirect('/copy/list');
    }

    public function store(Request $request){
        $copy = new Copy();
        $copy->publication = $request->publication;
        $copy->book_id = $request->book_id;
        $copy->hardcovered = $request->hardcovered;
        $copy->status = $request->status;
        $copy->save();
        //még nem létezik...
        return redirect('/copy/list');
    }
}
