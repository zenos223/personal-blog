<?php

namespace App\Http\Controllers;

use App\Models\LikesDislike;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LikeDislikeController extends Controller
{
    public function like($postId){
        $isExit = LikesDislike::where('post_id','=',$postId)->where('user_id', '=', FacadesAuth::user()->id)->first();

        if($isExit){
            if($isExit->type == 'like'){
                return back();
            }else{
                LikesDislike::where('id',$isExit->id)->update([
                    'type'=>'like',
                ]);
                return back();
            }
        }else{
            LikesDislike::create([
            'post_id'=>$postId,
            'user_id'=>FacadesAuth::user()->id,
            'type'=>'like'
        ]);
            return back();
        }
        
    }
    public function dislike($postId){
        $isExit = LikesDislike::where('post_id','=',$postId)->where('user_id', '=', FacadesAuth::user()->id)->first();

        if($isExit){
            if($isExit->type == 'dislike'){
                return back();
            }else{
                LikesDislike::where('id',$isExit->id)->update([
                    'type'=>'dislike',
                ]);
                return back();
            }
        }else{
            LikesDislike::create([
            'post_id'=>$postId,
            'user_id'=>FacadesAuth::user()->id,
            'type'=>'dislike'
        ]);
            return back();
        }
    }
}
