@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="card col-sm-8 m-auto">
        <div class="form-wrap col-xs-8 col-lg-6 m-auto">
            <div class="form-group text-center mb-0">
            　　<h2 class="logo-img mx-auto font-weight-bold mb-5 mt-5">新規登録</h2>
            </div>
      　　{!! Form::open(['route' => 'signup.post']) !!}
           　<div class="form-group">
               　{!! Form::email('email', old('email'), ['class' => 'form-control','placeholder' => 'メールアドレス']) !!}
           　</div>
           　<div class="form-group">
               　{!! Form::text('name', old('name'), ['class' => 'form-control','placeholder' => 'ユーザー名']) !!}
           　</div>
           　<div class="form-group">
               　{!! Form::password('password', ['class' => 'form-control','placeholder' => 'パスワード']) !!}
           　</div>
           　<div class="form-group">
               　{!! Form::password('password_confirmation', ['class' => 'form-control','placeholder' => 'パスワード再確認']) !!}
           　</div>
           　<div class="actions text-center">
               　{!! Form::submit('新規登録',['class' => 'btn btn-info w-auto']) !!}
           　</div>
      　  {!! Form::close() !!}
      　<br>
        </div>
      　{{-- <p class="devise-link text-center">アカウントをすでにお持ちの場合⇨{!! link_to_route('login', 'ログインする') !!}</p> --}}
    </div>  
</div>

@endsection