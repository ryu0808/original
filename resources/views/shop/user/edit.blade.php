@extends('layouts.shop')
@section('title', 'プロフィール情報の編集')

@section('content')
    <div class="container">
        <div class="row">
            <h3>プロフィールの編集</h3>
            <p class="ml-auto home"><a href="{{ action('HomeController@index') }}">トップページ</a></p>
            
            <div class="col-md-12 mx-auto">
                <form action="{{ action('Shop\UserController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="name">氏名 or 店舗名 or 保健所名</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user_form->name) }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="hiragananame">ふりがな</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="hiragananame" value="{{ old('hiragananame', $user_form->hiragananame) }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="prefecture">都道府県</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="prefecture" value="{{ old('prefecture', $user_form->prefecture) }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="city">市区町村</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="city" value="{{ old('city', $user_form->city) }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="address">番地・アパート名</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="address" value="{{ old('address', $user_form->address) }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="email">メールアドレス</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="email" value="{{ old('email', $user_form->email) }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="phone">電話番号</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="phone" value="{{ old('phone', $user_form->phone) }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10 offset-md-3">
                            <input type="hidden" name="id" value="{{ $user_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection