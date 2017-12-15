<?php

namespace App\Http\Controllers;
use App\Komentar;
use Illuminate\Http\Request;
use Auth;

class komentarController extends Controller
{
	public function index(){
		return Komentar::all();
	}

	public function show($id){
		return Komentar::find($id);
	}


    public function store(Request $request){
    	$this->validate($request, [

    		'judul'=>'required',
    		'tutorial_id'=>'required'

    		]);

    	$create = $request->user()->komentars()->create([
    		'judul' =>$request->json('judul'),
    		'tutorial_id'=>$request->json('tutorial_id')

    		]);
    	return $create;
    }
}
