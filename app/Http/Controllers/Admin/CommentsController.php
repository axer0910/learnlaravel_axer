<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Comment;
use App\Article_Comment;

use Redirect, Input;

class CommentsController extends Controller {

	public function index()
	{
		$v =array(
            'comments' => Comment::all(),
            'article_comments' => Article_Comment::all()
        );
		return view('admin.comments.index')->with('comments',$v);
	}

	public function edit($id)
	{
		return view('admin.comments.edit')->withComment(Comment::find($id));
	}

    public function editComments($type,$id)
    {
        if ($type == 'article'){
            $data['type'] = 'article';
            $data['content'] = Article_Comment::find($id);
            return view('admin.comments.edit')->with('comment',$data);
        }
        else if ($type == 'page'){
            $data['type'] = 'page';
            $data['content'] = Comment::find($id);
            return view('admin.comments.edit')->with('comment',$data);
        }
        else{
            return Redirect::back();
        }
    }




	public function update(Request $request,$type ,$id)
	{
		$this->validate($request, [
			'nickname' => 'required',
			'content' => 'required',
		]);
        if ($type == 'page'){
            if (Comment::where('id', $id)->update(Input::except(['_method', '_token']))) {
                return Redirect::to('admin/comments');
            } else {
                return Redirect::back()->withInput()->withErrors('更新失败！');
            }
        }
        else if ($type == 'article'){
            if (Article_comment::where('id', $id)->update(Input::except(['_method', '_token']))) {
                return Redirect::to('admin/comments');
            } else {
                return Redirect::back()->withInput()->withErrors('更新失败！');
            }
        }
        else{
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }

	}

	public function destroy($id)
	{
		$comment = Comment::find($id);
		$comment->delete();

		return Redirect::to('admin/comments');
	}

}