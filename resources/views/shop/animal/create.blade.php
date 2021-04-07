@extends('layouts.shop')

@section('title', 'ワンちゃん登録画面')

@section('content')
    <div class="container">
        <div class="row">
            <h5>ワンちゃんの登録</h5>
            <p class="ml-auto home"><a href="{{ action('HomeController@index') }}">トップページ</a></p>
            
            <div class="col-md-12 mx-auto">
                <form action="{{ action('Shop\AnimalController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-3">犬種</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="dogtype" value="{{ old('dogtype') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">毛色</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="color" value="{{ old('color') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">性別</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">出身地</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="prefecture" value="{{ old('prefecture') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">誕生日</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="birthday" value="{{ old('birthday') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">税込価格</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">ワクチン接種の詳細<br>（接種済みワクチン、接種日など）</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="vaccine" rows="10">{{ old('vaccine') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3">登録するワンちゃんの画像</label>
                        <div class="col-md-5">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection