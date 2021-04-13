@extends('layouts.shop')
@section('title', 'プロフィール情報')

@section('content')
    <div class="container">
        <div class="row">
            <h5>プロフィール情報</h5>
            <p class="ml-auto home"><a href="{{ action('HomeController@index') }}">トップページ</a></p>
        </div>
            
            <div class="col-md-8 mx-auto"> 
                @if(!is_null($user_form))
                    <div class="row">
                        <label class="col-md-3" for="name">氏名 or 店舗名 or 保健所名</label>
                        <div class="col-md-5">
                            <p type="text" class="form-control" name="name">{{ str_limit($user_form->name, 100) }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="col-md-3" for="hiragananame">ふりがな</label>
                        <div class="col-md-5">
                            <p type="text" class="form-control" name="hiragananame">{{ str_limit($user_form->hiragananame, 100) }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="col-md-3" for="prefecture">都道府県</label>
                        <div class="col-md-2">
                            <p type="text" class="form-control" name="prefecture">{{ str_limit($user_form->prefecture, 100) }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="col-md-3" for="city">市区町村</label>
                        <div class="col-md-5">
                            <p type="text" class="form-control" name="city">{{ str_limit($user_form->city, 100) }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="col-md-3" for="address">番地・アパート名</label>
                        <div class="col-md-5">
                            <p type="text" class="form-control" name="address">{{ str_limit($user_form->address, 100) }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="col-md-3" for="email">メールアドレス</label>
                        <div class="col-md-5">
                            <p type="text" class="form-control" name="email">{{ str_limit($user_form->email, 100) }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="col-md-3" for="phone">電話番号</label>
                        <div class="col-md-5">
                            <p type="text" class="form-control" name="phone">{{ str_limit($user_form->phone, 100) }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="ml-auto">
                            <a href="{{ action('Shop\UserController@edit', ['id' => $user_form->id]) }}" role="button" class="btn btn-primary btn btn-success edit">プロフィール情報の編集</a>
                        </div>
                    </div>
                @endif
            </div>
               
    </div>
@endsection