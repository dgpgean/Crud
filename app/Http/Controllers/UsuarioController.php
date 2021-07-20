<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Event;
class UsuarioController extends Controller
{
   
    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $user = new Usuario;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        //upload image
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $request_image = $request->image;

            $extension = $request_image->extension();

            $image_name = md5($request_image->getClientOriginalName(). strtotime('now')). "." .$extension;

            $request->image->move(public_path('img/users'),$image_name);

            $user->imagem = $image_name;



        }

        $user->save();

        return redirect('/');  
    }

    public function login (Request $request){
        $user = Usuario::where('email',$request->email)->get();
        session_start();
        if(count($user)>0){
            if($user[0]->password == $request->password){
                $event = Event::where('user_id',$user[0]->id)->get(); 
                $_SESSION['name'] = $user[0]->name;
                $_SESSION['id'] = $user[0]->id;
                $_SESSION['img'] = $user[0]->imagem;
                return view('schedule.index',['user'=>$user[0],'events'=>$event]);

            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/')->with('msg','Usuário não cadastrado!');
        }
    }

}
