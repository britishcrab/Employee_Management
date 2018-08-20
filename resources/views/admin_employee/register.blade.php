@extends('layouts.admin_master')
@section('title', 'Employee register')

@section('sidebar')
    @parent
@endsection

@section('content')
    <h1>従業員新規登録</h1>
    {!! Form::open(['url' => route('admin.register.post'), 'class' =>"form-horizontal"])!!}
    <div class="container col-sm-12 form-group lead">
        <div class="form-group">
            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                @if($errors->has('first_name'))<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">@endif
                    <label class="col-sm-3 control-label" for="name">氏名：</label>
                    <div class="form-inline col-sm-9" id="name">
                        姓{!! Form::input('text', 'last_name', '', ['required', 'class' => 'form-control', 'id' => 'name']) !!}
                        名{!! Form::input('text', 'first_name', '', ['required', 'class' => 'form-control', 'id' => 'name']) !!}
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                        @endif
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    @if($errors->has('first_name'))</div>@endif
            </div>
        </div>
        <div class="form-group">
            <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label" for="birthday">生年月日：</label>
                <div class="dateArea">
                    <div class="col-sm-9" id="birthday">
                        {!! Form::text('birthday', '', ['placeholder' => 'xxxx/xx/xx', 'autocomplete' => 'off']) !!}
                        @if ($errors->has('birthday'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group{{ $errors->has('mail') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label" for="mail">メールアドレス：</label>
                <div class="col-sm-9" id="mail">
                    {!! Form::input('text', 'mail', '', ['required', 'class' => 'form-control', 'id' => 'mail']) !!}
                    @if ($errors->has('mail'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('mail') }}</strong>
                                    </span>
                    @endif
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label" for="password">パスワード：</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label" for="password_comfirm">パスワード(確認)：</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password_comfirm" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                    @endif
                </div>

            </div>
        </div>
        <div class="form-group" >
            <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label" for="role_id">役職：</label>
                <div class="form-group"  id="role_id">
                    @if(session('my_role_id') == 1)
                        <select name="role_id">
                            <option value="">選択</option>
                            <option value="1">管理</option>
                            <option value="2">役員</option>
                            <option value="3">社員</option>
                        </select>
                    @else
                        <select name="role_id">
                            <option value="">選択</option>
                            <option value="3">社員</option>
                        </select>
                    @endif
                    @if ($errors->has('role_id'))
                        <span class="help-block col-sm-offset-4">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                    @endif
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::open(['url' => route('admin.register.post'), 'class' =>"form-horizontal"])!!}
                <button type="submit" class="btn btn-primary col-xs-5">実行</button>
                {!! Form::close() !!}
                <button type="button" class="btn btn-default col-xs-5" onclick="location.href='{{URL::previous()}}'">取り消し</button>
            </div>
        </div>
    </div>


@endsection