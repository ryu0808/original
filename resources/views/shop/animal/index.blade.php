@extends('layouts.shop')
@section('title', '登録済みワンちゃん一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h5>ワンちゃん一覧</h5>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Shop\AnimalController@add') }}" role="button" class="btn btn-primary btn btn-success">新しくワンちゃんを登録</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Shop\AnimalController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">都道府県名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_prefecture" value="{{ $cond_prefecture }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-animal col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-hover table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th width="15%">画像</th>
                                <th width="15%">犬種</th>
                                <th width="10%">毛色</th>
                                <th width="5%">性別</th>
                                <th width="8%">出身地</th>
                                <th width="10%">誕生日</th>
                                <th width="10%">価格</th>
                                <th width="20%">接種済みワクチン</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $animal)
                                <tr>
                                    <th>{{ $animal->image_path }}</th>
                                    <td>{{ \Str::limit($animal->dogtype, 100) }}</td>
                                    <td>{{ \Str::limit($animal->color, 30) }}</td>
                                    <td>{{ \Str::limit($animal->gender, 30) }}</td>
                                    <td>{{ \Str::limit($animal->prefecture, 30) }}</td>
                                    <td>{{ \Str::limit($animal->birthday, 30) }}</td>
                                    <td>{{ \Str::limit($animal->price, 30) }}</td>
                                    <td>{{ \Str::limit($animal->vaccine, 200) }}</td>
                                    <td>
                                        @can('view', $animal)
                                        <div>
                                            <a class="btn btn-primary btn-sm" href="{{ action('Shop\AnimalController@edit', ['id' => $animal->id]) }}" role="button">編集</a>
                                        </div>
                                        @endcan
                                        
                                        @can('delete',$animal )
                                        <div>
                                            <a class="btn btn-danger btn-sm" href="{{ action('Shop\AnimalController@delete', ['id' => $animal->id]) }}" role="button">削除</a>
                                            <p class="notice">注）ワンクリックで削除されます</p>
                                        </div>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection