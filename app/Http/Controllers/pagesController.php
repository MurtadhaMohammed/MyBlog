<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\User;
use App\Department;
use App\Commint;
use App\Like;
use App\Save;
use Response;
use Hash;
use App\Role;
class pagesController extends Controller
{   
    /*get all posts in home page-----------------------------*/
    public function getPosts(){
        //select all posts and ordering as ctreated at
        $posts=Post::orderBy('created_at', 'desc')->get();
        //take title page
        $title='All Post';
        return view('pages.posts',compact('posts','title'));
    }
    /*-------------------------------------------------------*/
    

    /* get results search---------------------------------------------------------*/
    public function getResultSearch(Request $req){
        $value=$req->value;
        $posts=Post::where('title', 'LIKE', '%' . $value . '%')->orderBy('created_at', 'desc')->get();
        $title='Search Result : "'.$value.'"';
        return view('pages.posts',compact('posts','title'));
    }
    /*-----------------------------------------------------------------------------*/

    /*get post that selected and get its commints, likes , stored posts and check thier----------------------*/
    public function getPost($user_id,$post_id){
        // 1-get number of likes in this post
        $like=Like::where('post_id',$post_id)->count();
        // 2-get number of commints in this post
        $numb_commint=Commint::where('post_id',$post_id)->count();
        // 3-get all commints in this post
        $commints=Commint::where('post_id',$post_id)->orderBy('created_at', 'asc')->get();
        // 4-check if this user added like?
        $checklikes=DB::table('likes')->where([['post_id',$post_id],['user_id',$user_id]] )->value('like');
        // 6-get this post
        $post=Post::find($post_id);
       
       if($checklikes==1){
           $checklikes='found';
       }else
       {
            $checklikes='notfound';
       }

        return view('pages.post',compact('post','commints','like','numb_commint','checklikes'));
    }
    /*-------------------------------------------------------------------------------------------------------*/
    

    /*get an category by category name--------------------------------------*/
    public function departments($name){
        // 1-get department id by name
        $dep_id=DB::table('departments')->where('name',$name)->value('id');
        // 2-get all posts that have this dep_id
        $posts=Post::where('department_id',$dep_id)->get();
        // 3-set titel in this dep name
        $title=$name;
        return view('pages.posts',compact('posts','title'));
    }
    /*----------------------------------------------------------------------*/

    
    /*show register form--------------*/
    public function register(){
        return view('auth.register');
    }
    /*--------------------------------*/


    /*show login form--------------*/
    public function login(){
        return view('auth.login');
    }
    /*--------------------------------*/

    /*show user profile-----------------------------------------------------------*/
    public function profile($user){
        // 1-get posts from this user
        $posts=Post::where('user_id',$user)->orderBy('created_at', 'desc')->get();
        // 2-get this user information
        $user=User::find($user);

        return view('pages.profile',compact('posts','user'));
    }
    /*----------------------------------------------------------------------------*/


    /*show add post form-------------*/
    public function addPost(){
        return view('pages.addPost');
    }
    /*--------------------------------*/

    /*show add post form-------------*/
    public function editAcount(Request $req){
        $user_id=$req->user_id;
        $user=User::find($user_id);
        return view('pages.editAcount',compact('user'));
    }
    /*--------------------------------*/

    /* get all categories---------------------------------------*/
    public function getDep(){
        return view('pages.addPost',['dep'=>Department::all()]);
    }
    /*-----------------------------------------------------------*/

    /* store post in database------------------------------------------*/
    public function storePost(Request $req){
        $post=new Post;
        $post->title=$req->title;
        $post->body=$req->body;
        //get image extention and taks new name
        $img_name=time().'.'.$req->url->getClientOriginalExtension();
        $post->img=$img_name;
        $post->user_id=$req->user_id;
        $post->department_id=$req->dep;
        $post->save();

         /* move image file*/
        $req->url->move(public_path('img/posts'),$img_name);

        return back();
    }
    /*-----------------------------------------------------------------*/


    /* store category in database-----------*/
    public function storeDep(Request $req){
        $dep=new Department;
        $dep->name=$req->name;
        $dep->save();

        return back();
    }
    /*--------------------------------------*/
    

    /* stoe commint in database------------------*/
    public function storeCommint(Request $req){
        $commint=new Commint;
        $commint->commint=$req->commint;
        $commint->post_id=$req->post_id;
        $commint->user_id=$req->user_id;
        $commint->save();
       // return compact($commint);
            return response()->json($commint);
    }
    /*------------------------------------------*/
     
    /* store like in database---------------------------------------------------------------*/
    public function storeLike(Request $req){
        // check if this user added like?
        $likes=Like::where([['post_id',$req->post_id],['user_id',$req->user_id]] )->count();
        if($likes<1){
            $like=new Like;
            $like->like=$req->like;
            $like->post_id=$req->post_id;
            $like->user_id=$req->user_id;
            $like->save();
            return response()->json($like);
        }
        else
        {
  
           return response()->json($likes);
        }
        
    }
    /*--------------------------------------------------------------------------------------*/
     public function control(){
    
         $users=User::all();
         return view('pages.control',compact('users'));
     }

     public function addRole(Request $request){
       $users=User::where('id',$request->id)->first();
       $users->roles()->detach();
       if($request->role==1)
       {
           $users->roles()->attach(Role::where('name','Admin')->first());
           
       }
          if($request->role==2)
       {
            $users->roles()->attach(Role::where('name','Editor')->first());
       }
           if($request->role==3)
       {
            $users->roles()->attach(Role::where('name','User')->first());
       }

       return redirect()->back();
    }

}
