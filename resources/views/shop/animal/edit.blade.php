@extends('layouts.shop')
@section('title', 'ワンちゃん情報の編集')

@section('content')
    <div class="container">
        <div class="row">
            <h5>ワンちゃん情報の編集</h5>
            <p class="ml-auto home"><a href="{{ action('HomeController@index') }}">トップページ</a></p>
            
            <div class="col-md-12 mx-auto">
                <form action="{{ action('Shop\AnimalController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="dogtype">犬種</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="dogtype" value="{{ $animal_form->dogtype }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="color">毛色</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="color" value="{{ $animal_form->color }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="gender">性別</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="gender" value="{{ $animal_form->gender }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="prefecture">出身地</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="prefecture" value="{{ $animal_form->prefecture }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="birthday">誕生日</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="birthday" value="{{ $animal_form->birthday }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="price">税込価格</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="price" value="{{ $animal_form->price }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="vaccine">ワクチン接種の詳細<br>（接種済みワクチン、接種日など）</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="vaccine" rows="10">{{ $animal_form->vaccine }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="image">画像</label>
                        <div class="col-md-5">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $animal_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $animal_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="変更">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection