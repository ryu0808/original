<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   
    public function index(Request $request)
    {
        return view('shop.user.index', ["user_form" => Auth::user()]);
    }
    
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        if(empty($user)) {
            abort(404);
        }
        return view('shop.user.edit', ['user_form' => $user]);
    }
    
    public function update(Request $request)
    {
        $request->validate([$request,
            'name' => 'required',
            'hiragananame' => 'required',
            'prefecture' => 'required',
            'city' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            ]);
        $user = User::find($request->id);
        $user_form = $request->all();
        
        unset($user_form['_token']);
        
        $user->fill($user_form)->save();
        
        return redirect('shop/user/edit?id='. $user->id );
    }
}
