@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">管理评论</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr class="row">
                                <th class="col-lg-4">Content</th>
                                <th class="col-lg-2">User</th>
                                <th class="col-lg-4">Page</th>
                                <th class="col-lg-1">编辑</th>
                                <th class="col-lg-1">删除</th>
                            </tr>
                            @foreach ($comments['comments'] as $comment)
                                <tr class="row">
                                    <td class="col-lg-6">
                                        {{ $comment->content }}
                                    </td>
                                    <td class="col-lg-2">
                                        @if ($comment->website)
                                            <a href="{{ $comment->website }}">
                                                <h4>{{ $comment->nickname }}</h4>
                                            </a>
                                        @else
                                            <h3>{{ $comment->nickname }}</h3>
                                        @endif
                                        {{ $comment->email }}
                                    </td>
                                    <td class="col-lg-4">
                                        <a href="{{ URL('pages/'.$comment->page_id) }}" target="_blank">
                                            {{ App\Page::find($comment->page_id)->title }}
                                        </a>
                                    </td>
                                    <td class="col-lg-1">
                                        <a href="{{ URL('admin/comments/edit/page/'.$comment->id) }}" class="btn btn-success">编辑</a>
                                    </td>
                                    <td class="col-lg-1">
                                        <form action="{{ URL('admin/comments/'.$comment->id) }}" method="POST" style="display: inline;">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <table class="table table-striped">
                            <tr class="row">
                                <th class="col-lg-4">Content</th>
                                <th class="col-lg-2">User</th>
                                <th class="col-lg-4">Page</th>
                                <th class="col-lg-1">编辑</th>
                                <th class="col-lg-1">删除</th>
                            </tr>
                            @foreach ($comments['article_comments'] as $c)
                                <tr class="row">
                                    <td class="col-lg-6">
                                        {{ $c->content }}
                                    </td>
                                    <td class="col-lg-2">
                                        @if ($c->website)
                                            <a href="{{ $c->website }}">
                                                <h4>{{ $c->nickname }}</h4>
                                            </a>
                                        @else
                                            <h3>{{ $c->nickname }}</h3>
                                        @endif
                                        {{ $c->email }}
                                    </td>
                                    <td class="col-lg-4">
                                        <a href="{{ URL('articles/'.$c->article_id) }}" target="_blank">
                                            {{ App\Article::find($c->article_id)->title }}
                                        </a>
                                    </td>
                                    <td class="col-lg-1">
                                        <a href="{{ URL('admin/comments/edit/article/'.$c->id) }}" class="btn btn-success">编辑</a>
                                    </td>
                                    <td class="col-lg-1">
                                        <form action="{{ URL('admin/comments/'.$c->id) }}" method="POST" style="display: inline;">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection