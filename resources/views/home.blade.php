@extends('layouts.front')
@section('title', 'トップページ')

@section('content')
<div class="container">
    <div class="row">
        <h3>ワンちゃんとマッチングしよう</h3>
    </div>
    <div class="flex">
        <h6>ワンちゃん情報を登録・編集する<br><br>
            <a href="{{ action('Shop\AnimalController@add') }}" class="doghome">新しくワンちゃんを登録する</a><br><br>
            <a href="{{ action('Shop\AnimalController@index') }}" class="doghome">ワンちゃん情報を編集する</a><br><br><br>
            プロフィール情報<br><br>
            <a href="{{ action('Shop\UserController@index') }}" class="doghome">自分のプロフィール情報を確認する</a><br>
        </h6>
        <img src="{{ asset('image/puppies.jpg') }}" alt="ホームページ画像" class="rounded-circle">
        <h6>ワンちゃんを探す<br><br>
            <a href="{{ action('Shop\AnimalController@index') }}" class="doghome">ワンちゃんのいる都道府県で検索する</a>
        </h6>
    </div>


    <div class="row">
        <h2>新着ワンちゃん<br><br>↓ ↓ ↓</h2>
    <div class="row">
        <div class="posts col-md-8 mx-auto mt-3">
            @foreach($posts as $post)
                <div class="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="image">
                                @if ($post->image_path)
                                    <a href="{{ action('Shop\AnimalController@show', ['id' => $post->id]) }}"><img src="{{ asset('storage/image/' . $post->image_path) }}"></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="date">
                                {{ $post->created_at->format('Y年m月d日') }}
                            </div>
                            <div class="col-md-6">
                                <p class="body mx-auto"><span>犬種 : </span>{{ str_limit($post->dogtype, 50) }}</p>
                                <p class="body mx-auto"><span>毛色 : </span>{{ str_limit($post->color, 50) }}</p>
                                <p class="body mx-auto"><span>性別 : </span>{{ str_limit($post->gender, 20) }}</p>
                                <p class="body mx-auto"><span>出身地 : </span>{{ str_limit($post->prefecture, 50) }}</p>
                                <p class="body mx-auto"><span>誕生日 : </span>{{ str_limit($post->birthday, 50) }}</p>
                                <p class="body mx-auto"><span>税込価格 : </span>{{ str_limit($post->price, 50) }}</p>
                                <p class="body mx-auto"><span>ワクチン詳細 : </span>{{ str_limit($post->vaccine, 150) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr color="#c0c0c0">
            @endforeach
        </div>
    </div>
    </div>
</div>

@endsection
