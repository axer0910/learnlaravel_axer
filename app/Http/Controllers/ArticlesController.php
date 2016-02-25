<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller {

	public function show($id)
	{
		return view('article.show')->with('article',Article::find($id));
	}
}
