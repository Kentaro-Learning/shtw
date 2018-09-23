<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Win_menber;
use App\Character;

class Win_menbersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::all();
        //$characters = Character::where('position',1)->get();
        return view('index',[
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
        $win_menber = new Win_menber;
        $characters = Character::all();
        return view('Win_menbers/create', [
            'win_menber' => $win_menber,
            'characters' => $characters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //データチェック
        //dd($request);
        //データ引き寄せ
        $date  = Carbon::create($request->year,$request->month,$request->day)->toDateString();;
        $env = \DB::table('environments')->select('id')
            ->whereDate('date','<=',$date)
            ->orderby('date','asc')->first();
        
        //データ入れる
        $win_menber = new Win_menber;
        for($i = 1; $i <= 5 ; $i++)
        {
            $win_menber->{'my'.$i.'_id'} =  $request->my_id[5-$i];
            $win_menber->{'my'.$i.'_star'} =  $request->my_star[5-$i];
            $win_menber->{'enemy'.$i.'_id'} =  $request->enemy_id[5-$i];
            $win_menber->{'enemy'.$i.'_star'} =  $request->enemy_star[5-$i];
        }  
        $win_menber->env_id = $env->id;
        $win_menber->image = 'URL';
        //dd($win_menber);
        //データ並び替え
/*        
        for($i = 0; $i <= 4 ; $i++)
        {
            $my_menbers[$i] = ['id' =>$request->my_id[$i],'star' => $request->my_star[$i]];
            $sort_key_m[$i] = $request->my_id[$i];
            $enemy_menbers[$i] = ['id' =>$request->enemy_id[$i],'star' => $request->enemy_star[$i]];
            $sort_key_e[$i] = $request->enemy_id[$i];            $enemy_menbers[$i] = ['id' =>$request->enemy_id[$i],'star' => $request->enemy_star[$i]];
            $sort_key_e[$i] = $request->enemy_id[$i];
        array_multisort($sort_key_m,SORT_ASC,$my_menbers);
        arra
        }
        array_multisort($sort_key_m,SORT_ASC,$my_menbers);
        array_multisort($sort_key_e,SORT_ASC,$enemy_menbers);
*/        
        $exist = $win_menber->check_dup()->exists();
        if($exist)
        {
            return redirect('/')->with('message','同内容の投稿が既に存在します');
        }else{
            $win_menber->save();
            return redirect('/')->with('information','新規投稿ありがとうございます');
        }    
    }
    
    public function pre_store(Request $request)
    {
        //データチェック
        //dd($request);
        //データ引き寄せ
        $win_menber = new Win_menber;
        $cnt_my    = count($request->my_menber) == 5 ;
        $cnt_enemy = count($request->enemy_menber) == 5 ;
        if ($cnt_my && $cnt_enemy) 
        {
            $my_menbers = Character::find($request->my_menber);
            $enemy_menbers = Character::find($request->enemy_menber);
            $my_menbers = $my_menbers->sort(function($first, $second) {
                 return $second->position <=> $first->position
                     ?: $second->order   <=> $first->order;
              });
            $enemy_menbers = $enemy_menbers->sort(function($first, $second) {
                 return $second->position <=> $first->position
                     ?: $second->order   <=> $first->order;
              });
            //dd($my_menbers);
            //dd($enemy_menbers);
            return view('Win_menbers/pre_create', [
                'win_menber' => $win_menber,
                'my_menbers' => $my_menbers,
                'enemy_menbers' => $enemy_menbers,
        ]);  
            
        }else{
            return Redirect()->back()->withInput()->with('message','選択したキャラ数が不正です');
        }


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function show_result(Request $request)
    {
        //dd($request);
        for($i = 0 ;$i <= 4;$i++)
        {
            $enemy_id = $request->enemy_id[$i];
            $enemy_ids[] = $enemy_id;
        }
        //sort($enemy_ids);
        $enemys = Character::find($request->enemy_id);
        $enemys = $enemys->sort(function($first, $second) {
             return $first->position <=> $second->position
                 ?: $first->order    <=>$second->order;
          });        
        $enemy_ids = array();
        foreach($enemys as $enemy)
        {
            $enemy_ids[] = $enemy->id;
        }
        //dd($enemy_ids);
        $date  = Carbon::create($request->year,$request->month,$request->day)->toDateString();;
        //dd($date);
        $env = \DB::table('environments')->select('*')
            ->whereDate('date','<=',$date)
            ->orderby('date','desc')->first();
        //dd($env);
        $results = \DB::table('win_menbers')
            ->where('enemy1_id',$enemy_ids[0])
            ->where('enemy2_id',$enemy_ids[1])
            ->where('enemy3_id',$enemy_ids[2])
            ->where('enemy4_id',$enemy_ids[3])
            ->where('enemy5_id',$enemy_ids[4])
            ->where('env_id',$env->id)->get();
        //dd($results);
        $exist = $results->count();    
        if(empty($exist)){
            return Redirect()->back()->with('message','検索結果が存在しません');
        }
        
        //$characters = Character::all();
        $characters = Character::orderby('id', 'asc')->get();
        //dd($characters);
        return view('result',[
            'results' => $results,
            'characters' => $characters,
            'env' => $env,
        ]);
            
    }
    
    public function show_result_more(Request $request)
    { 
        //dd($request);
        
        $results = \DB::table('win_menbers')
            ->where('enemy1_id',$request->more_id5)->where('enemy1_star','>=',$request->more_star[4])
            ->where('enemy2_id',$request->more_id4)->where('enemy2_star','>=',$request->more_star[3])
            ->where('enemy3_id',$request->more_id3)->where('enemy3_star','>=',$request->more_star[2])
            ->where('enemy4_id',$request->more_id2)->where('enemy4_star','>=',$request->more_star[1])
            ->where('enemy5_id',$request->more_id1)->where('enemy5_star','>=',$request->more_star[0])
            ->where('env_id',$request->env_id)->get();
        //dd($results);    
        $exist = $results->count();    
        if(empty($exist)){
            return Redirect()->back()->with('message','検索結果が存在しません');
        }
        $env = \DB::table('environments')->select('*')
            ->where('id','=',$request->env_id)->first();
        $characters = Character::all();
        //dd($characters);
        return view('result',[
            'results' => $results,
            'characters' => $characters,
            'env' => $env,
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
        //
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
        //
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
