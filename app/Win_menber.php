<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Win_menber extends Model
{

    function chara($no)
    {
        return Character::find($no);
    }

    function my_team()
    {
        return Character::find([$this->my1_id,$this->my2_id,$this->my3_id,$this->my4_id,$this->my5_id]);
    }
    function enemy_team()
    {
        return Character::find([$this->enemy1_id,$this->enemy2_id,$this->enemy3_id,$this->enemy4_id,$this->enemy5_id]);
    }
    
    function check_dup()
    {
        return Win_menber::where('my1_id',$this->my1_id)->where('my1_star',$this->my1_star)
                         ->where('my2_id',$this->my2_id)->where('my2_star',$this->my2_star)
                         ->where('my3_id',$this->my3_id)->where('my3_star',$this->my3_star)
                         ->where('my4_id',$this->my4_id)->where('my4_star',$this->my4_star)
                         ->where('my5_id',$this->my5_id)->where('my5_star',$this->my5_star)
                         ->where('env_id',$this->env_id);
    }
    
    
}
