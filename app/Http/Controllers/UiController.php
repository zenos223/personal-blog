<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\App\Models\Skill;
use App\Models\Category;
use App\Models\Comment;
use App\Models\LikesDislike;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill as ModelsSkill;
use App\Models\StudentCount;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    public function index(){
        $skills = ModelsSkill::paginate(10);
        $projects = Project::all();
        $studentCount = StudentCount::find(1);
        $posts = Post::latest()->take(6)->get();
        
        return view('ui-panel.index',compact('skills','projects','studentCount','posts'));
    }
    public function postsIndex(){
        $categories = Category::all();
        $posts = Post::latest()->paginate(10);
        return view('ui-panel.posts',compact('categories','posts'));
    }
    public function postDetails($id){
        $post = Post::find($id);
        $likes = LikesDislike::where('post_id',$id)->where('type','like')->get();
        $dislikes = LikesDislike::where('post_id',$id)->where('type','dislike')->get();
        $likeStatus = LikesDislike::where('post_id',$id)->where('user_id',Auth::user()->id)->first();

        $comments = Comment::where('post_id',$id)->where('status','show')->get();
        return view('ui-panel.post-details',compact('post','likes','dislikes','likeStatus','comments'));
    }
    public function search(Request $request){
        $categories = Category::all();
        $searchData = $request->search_data;

        $posts = Post::where('title','like',"%".$searchData."%")
        ->orWhere('content','like',"%".$searchData."%")
        ->orWhereHas('category',function($category) use($searchData){
            $category->where('name','like',"%".$searchData."%");
        })
        ->paginate(10);
        return view('ui-panel.posts',compact('categories','posts'));
    }

    public function searchByCategory($categoryId){
        $categories = Category::all();
        $posts = Post::where('category_id',$categoryId)->paginate(10);
        return view('ui-panel.posts',compact('categories','posts'));
    }
}
