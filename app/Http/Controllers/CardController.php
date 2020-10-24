<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    
    public function index()
    {
        
        $cards = auth()->user()->cards()->with('photos')->get();

        //return $cards;
       
        return view('dashboard')->with('cards',$cards);
    }

    public function show(Card $card)
    {
        return view('show-card')->with('card',$card);
    }

    public function edit($id = 0)
    {
       $user = auth()->user();

       if($id > 0 ){
           $card = $user->cards()->where('id',$id)->first();
       } else {
           $card = Card::make(['id'=>0]);
       }
        return view('edit-card')->with('card',$card);
    }

    public function store($id = 0)
    {
        $data = request()->validate([
            'name' => 'required',
            'note' => 'nullable'
        ]);

        $data['user_id'] = auth()->user()->id;

        if($id > 0 ){
            Card::findOrFail($id)->update($data);
        } else {
            Card::create($data);
        }

        return redirect('/dashboard');
    }
}
