<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Character;
use Illuminate\Support\Facades\Storage;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::all();
        //dd($characters);
        return view('characters.index',[
            'characters' => $characters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //チェック処理
        //dd($request);
        $validatedData = $request->validate([
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('characters', $image, 'public');
        $url = Storage::disk('s3')->url($path);
        
        $position_cs = Character::where('position', $request->position)
                                ->where('order','>=',$request->order)->orderBy('order','asc')->get();
        
        //dd($position_cs);
        $make_chara = new Character;
        $make_chara->name = $request->name;
        $make_chara->position = $request->position;
        $make_chara->order = $request->order;
        $make_chara->image = $url;
        $make_chara->save();
        ///既存キャラのorder更新_後ろ倒しにする///
        $new_order = $request->order;

        foreach($position_cs as $position_c)
        {
            $new_order++;
            $position_c->order = $new_order;
            $position_c->save();
            
        }
        
        return redirect('/')->with('information','キャラ作成成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $character = Character::find($id);
       return view('characters.show',[
            'character' => $character,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $character = Character::find($id);
        return view('characters.edit',[
            'character' => $character,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $character = Character::find($id);
        $character->name = $request->name;
        $character->position = $request->position;
        $character->order = $character->order;
        
        $image = $request->file('image');
         $if = isset($image);
        {
            $path = Storage::disk('s3')->putFile('characters', $image, 'public');
            $url = Storage::disk('s3')->url($path);
            $character->image = $url;
        }
        $character->save();
        return redirect('characters')->with('information','キャラ編集成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
