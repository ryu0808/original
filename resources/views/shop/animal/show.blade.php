@extends('layouts.shop')

@section('title', 'ワンちゃん問い合わせ画面')

@section('content')
    <div class="container">
        <div class="row">
            <h3>ワンちゃんについて問い合わせする</h3>
            <p class="ml-auto home"><a href="{{ action('HomeController@index') }}">トップページ</a></p>
        </div>
            
        <div class="row">
            <div class="col-md-7 image2">
                @if ($animal_form->image_path)
                    <img src="{{ $animal_form->image_path }}">
                @endif
            </div>
            
            <div class="col-md-5">
                <div class="date">
                    {{ $animal_form->created_at->format('Y年m月d日') }}
                </div>
                <p class="body mx-auto"><span>犬種 : </span>{{ str_limit($animal_form->dogtype, 50) }}</p>
                <p class="body mx-auto"><span>毛色 : </span>{{ str_limit($animal_form->color, 50) }}</p>
                <p class="body mx-auto"><span>性別 : </span>{{ str_limit($animal_form->gender, 20) }}</p>
                <p class="body mx-auto"><span>出身地 : </span>{{ str_limit($animal_form->prefecture, 50) }}</p>
                <p class="body mx-auto"><span>誕生日 : </span>{{ str_limit($animal_form->birthday, 50) }}</p>
                <p class="body mx-auto"><span>税込価格 : </span>{{ str_limit($animal_form->price, 50) }}</p>
                <p class="body mx-auto"><span>ワクチン接種の詳細 : </span>{{ str_limit($animal_form->vaccine, 150) }}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 user">
                <h2>お問い合わせ先</h2>
                <p class="body mx-auto"><span>名前：</span>{{ str_limit($user_form->name, 50) }}（{{ str_limit($user_form->hiragananame, 50) }}）</p>
                <p class="body mx-auto"><span>住所：</span>{{ str_limit($user_form->prefecture, 50) }}{{ str_limit($user_form->city, 50) }}{{ str_limit($user_form->address, 50) }}</p>
                <p class="body mx-auto"><span>メールアドレス：</span>{{ str_limit($user_form->email, 50) }}</p>
                <p class="body mx-auto"><span>電話番号：</span>{{ str_limit($user_form->phone, 50) }}</p>
            </div>
        </div>
    </div>
@endsection