@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">插入新的article</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form action="{{URL('admin/article')}}" method="POST">
                        <h4>标题</h4>
                        <input type="text" class="form-control" required="required" name="title">
                        <h4>正文</h4>
                        <textarea rows="10" class="form-control" required="required" name="body"></textarea>
                        <h4>图片链接</h4>
                        <input type="text" class="form-control" name="image">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-lg btn-success">提交</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection