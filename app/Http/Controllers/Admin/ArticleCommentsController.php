<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;
use Redirect, Input, Auth;

class ArticleCommentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.articles.index');
	}

	public function edit($id)
	{
		return view('admin.articles.edit')->with('articleComments',Article::find($id));
	}

	public function destroy($id)
	{
		$page = Article::find($id);
		$page->delete();

		return Redirect::to('admin');
	}

}
