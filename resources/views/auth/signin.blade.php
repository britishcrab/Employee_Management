@extends('layouts.admin_master')

@section('title', 'signin')

@section('sidebar')
@endsection

@section('content')
    @if(isset($status))
        <div class="col-md-8 col-md-offset-4"><h2>ログインに失敗しました</h2></div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <h2 class="panel-heading">ログイン</h2>

                    <div class="panel-body">
                        {!! Form::open(['url' => route('signin.post'), 'class' =>"form-horizontal"]) !!}

                        <div class="form-group{{ $errors->has('mail') ? ' has-error' : '' }}">
                            <label for="mail" class="col-md-4 control-label">メールアドレス</label>

                            <div class="col-md-6">
                                {{Form::email('mail', old('mail'), ['class' => 'form-control'])}}

                                @if ($errors->has('mail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">パスワード</label>

                            <div class="col-md-6">
                                {{Form::password('password', ['class' => 'form-control'])}}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    ログイン
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
