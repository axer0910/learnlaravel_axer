<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Redirect, Input;

use App\Comment;
use App\Article_Comment;

class CommentsController extends Controller {

	public function storePageComment()
	{
		if (Comment::create(Input::all())) {
			return Redirect::back();
		} else {
			return Redirect::back()->withInput()->withErrors('评论发表失败！');
		}

	}

	/*
	 * 保存article的评论，使用store() POST方法
	 */

	public function store()
	{
		$article_comment = new Article_Comment();
		$article_comment->article_id = Input::get('article_id');
		$article_comment->nickname = Input::get('nickname');
		$article_comment->email = Input::get('email');
		$article_comment->website = Input::get('website');
		$article_comment->content = Input::get('content');
		if ($article_comment->save()){
			return Redirect::back();
		}
		else{
			return Redirect::back()->withInput()->withErrors('article评论发表失败！');
		}
	}

}