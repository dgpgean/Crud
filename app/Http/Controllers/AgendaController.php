<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Event;

class AgendaController extends Controller
{
   

    public function show(){
        session_start();
        $search = request('search');

        if($search){
            $event = Event::where([
                ['user_id','like',$_SESSION['id']],
                ['name','like','%'.$search.'%']
            ])->get();
            return view('schedule.index',['events'=>$event]);
        }
        else{
            $event = Event::where('user_id',$_SESSION['id'])->orderBy('date')->paginate(2);
            return view('schedule.index',['events'=>$event]);
        }
        
    }
    public function index(){
        return view('index');
    }
    public function create(){
        session_start();
        return view ('schedule.create');
    }
    public function store(Request $request){
        session_start();
        $data = ['name','adress','date','description','id'];
        $event = new Event;
        $event->name = $request->name;
        $event->adress = $request->adress;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->user_id = $request->id;
        

        for($i=0; $i<5; $i++){
           
            if($_POST[$data[$i]] == ''){
                $event = Event::where('user_id',$_SESSION['id'])->get(); 
                return redirect('/schedule/new-event')->with('msg-error','Preencha todos os campos corretamente!');
            }
        }
        $event->save();
        $event = Event::where('user_id',$request->id)->get(); 
        return redirect('/schedule/new-event')->with('msg-sucess','Evento criado com sucesso!');;

    }
    public function edit($id){
        session_start();
        $event = Event::where('id',$id)->get()->first();
        return view('schedule.edit',['event'=>$event]);
    }
    public function update(Request $request,$id){
        $data = ['name','adress','date','description','user_id'];
        for($i=0; $i<5; $i++){
            if($_POST[$data[$i]] == ''){
                return redirect('/schedule/'.$id)->with('msg','Preencha todos os campos corretamente!');
            }
        }
        Event::findOrfail($id)->update($request->all());
        return redirect('/schedule');
    }
    public function delete($id){
        Event::findOrfail($id)->delete();
        session_start();
        return redirect('/schedule');
    }
}
