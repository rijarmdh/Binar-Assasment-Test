<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutorial;

class tutorialController extends Controller
{
    public function create(Request $request){
    	$this->validate($request, [
    		'title' =>'required',
    		'body' => 'required', 
    		'slug' =>'required'
    		]);

    	$create = $request->User()->Tutorials()->create([
    		'title'=>$request->json('title'),
    		'body'=>$request->json('body'),
    		'slug'=> str_slug($request->json('slug')),
    		]);

    	return $create;
    }

    public function index(){
    	$index = Tutorial::with('komentars')->get();

    	return $index;
    }

    public function show($id){
    	$show = Tutorial::with('komentars')->where('id', $id)->first();

    	if(!$show){

    		return response()->json(['error' => 'invalid_credentials'], 401);
    	}

    	return $show;
    }

    public function update(Request $request, $id){
    	$edit = Tutorial::find($id);

    	if($request->User()->id != $edit->user_id){
    		return response()->json(['error' => 'beda user gan!'], 401);
    	}

    	$update = $edit->update($request->all());
    	

    	return $edit;
    }

    public function destroy(Request $request, $id){
    	$edit = Tutorial::find($id);

    	if($request->User()->id != $edit->user_id){
    		return response()->json(['error' => 'beda user gan!'], 401);
    	}

    	Tutorial::destroy($id);

    	return response()->json(['berhasil' => 'berhasil hapus dong '], 303);
    }
}
