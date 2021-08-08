<?php

namespace App\Models\Info;

use Illuminate\Database\Eloquent\Model;

use App\Models\Info\InfoTemplate;

class InfoBase extends Model
{
    //
    protected $guarded=['id'];

    //
    public function model(){
        return $this->morphTo();
    }
    //
    public function infoTemplate(){
        return $this->belongsTo('App\Models\Info\InfoTemplate','info_template_id');
    }
    //
    public function getTemplate(){
        return $this->infoTemplate()->first();
    }
    //
    public function infos(){
        return $this->hasMany('App\Models\Info\Info', 'info_base_id');
    }
    //
    public function info(){
        return $this->infos()->latest()->first();
    }

    //
    public function updateInfo(array $info){
        return $this->infos()->create([
            'info'=>$info,
        ]);
    }
    //
    public function partlyUpdateInfo(array $new_info){
        $info=$this->info()->info;
        foreach($new_info as $key=>$value){
            $info[$key]=$value;
        }
        return $this->infos()->create([
            'info'=>$info,
        ]);
    }
    //
    public function updateInfoEmptyFillDefault(array $new_info){
        $info=$this->getTemplate()->default;
        foreach($new_info as $key=>$value){
            $info[$key]=$value;
        }
        return $this->infos()->create([
            'info'=>$info,
        ]);
    }
    //
    public function changeName($name){
        return $this->fill(['name'=>$name])->save();
    }
}
