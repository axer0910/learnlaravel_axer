<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Redirect, Input, Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view('admin.articles.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request ,[
            'title' => 'required|unique:articles|max:255',
            'body' => 'required'
        ]);

        $article = new Article;
        $article->user_id = auth::user()->id;
        $article->body = Input::get('body');
        $article->title = Input::get('title');
        $article->image = Input::get('image');

        if($article->save()){
            return Redirect::to('admin');
        }
        else{
            return Redirect::back()->withInput()->withErrors('发生错误啦。');
        }

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return view('admin.articles.edit')->with('article',Article::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
        $this->validate($request ,[
            'title' => 'required|unique:articles|max:255',
            'body' => 'required'
        ]);

		$article = Article::find($id);
		$article->title = Input::get('title');
        $article->body = Input::get('body');
        $article->image = Input::get('image');
        if ($article->save()){
            return Redirect::to('admin');
        }
        else{
            return Redirect::back()->withInput()->withError('修改失败！');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $page = Article::find($id);
        $page->delete();

        return Redirect::to('admin');
	}

}
