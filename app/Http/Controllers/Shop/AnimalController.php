<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Animal;
use Auth;
use App\User;

class AnimalController extends Controller
{
    public function add()
    {
        return view('shop.animal.create');
    }
    
    public function create(Request $request)
    {
       $this->validate($request, Animal::$rules);
       
       $animal = new Animal;
       $form = $request->all();
       
       if(isset($form['image'])) {
           $path = $request->file('image')->store('public/image');
           $animal->image_path = basename($path);
       } else {
           $animal->image_path = null;
       }
       
       unset($form['_token']);
       unset($form['image']);
       
       $animal->fill($form);
       $animal->user_id = Auth::id();
       $animal->save();
       
        return redirect('shop/animal/create');
    }
    
    public function index(Request $request)
    {
        $cond_prefecture = $request->cond_prefecture;
      if ($cond_prefecture != '') {
          // 検索されたら検索結果を取得する
          $posts = Animal::where('prefecture', $cond_prefecture)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Animal::all();
      }
      return view('shop.animal.index', ['posts' => $posts, 'cond_prefecture' => $cond_prefecture]);
    }
    
    public function edit(Request $request)
    {
        $animal = Animal::find($request->id);
        $this->authorize('view', $animal); //これを入れることで、つまづいていた認可の問題が解決した。
        if(empty($animal)) {
            abort(404);
        }
        return view('shop.animal.edit', ['animal_form' => $animal]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Animal::$rules);
        $animal = Animal::find($request->id);
        $animal_form = $request->all();
        if($request->remove == 'true'){
            $animal_form['image_path'] = null;
        } elseif($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $animal_form['image_path'] = basename($path);
        } else {
            $animal_form['image_path'] = $animal->image_path;
        }
        
        unset($animal_form['image']);
        unset($animal_form['remove']);
        unset($animal_form['_token']);
        
        $animal->fill($animal_form)->save();
        
        return redirect('shop/animal/');
    }
    
    public function delete(Request $request)
    {
        $animal = Animal::find($request->id);
        $this->authorize('delete', $animal);
        $animal->delete();
        
        return redirect('shop/animal/');
    }
    
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit', 'updete', 'delete']);
        //$this->middleware('can:view,animal')->only(['edit', 'update']); この行を使うならRouting の設定が必要。
        $this->middleware('verified')->only('create');
    }
    
    public function show(Request $request)
    {
        $animal = Animal::find($request->id);
        
        return view('shop.animal.show', ['animal_form' => $animal, 'user_form' => $animal->user]);
    }
}
