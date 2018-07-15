<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
    	return view('welcome');
    }

    public function api()
    {
    	$review = Review::all();
    	return $review;
    }

    public function store(Request $request)
    {
        // dd($request);
    	Review::create([
    		'title' => $request->title,
    		'body' => $request->body
    	]);

    }

    public function update(Request $request, $id)
    {
        // dd($request);
        // dd($id);
        $review = Review::find($id);
        // dd($review->all());
        $review->update($request->all());
    }

    public function destroy($id)
    {
       Review::find($id)->delete();
    }
}
