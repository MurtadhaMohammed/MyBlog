<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use DB;
use File;
use Hash;
use App\Role;


class registerController extends Controller
{
    public function register(Request $request)
    {
        /*add user information*/
         $user=new User;
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password=bcrypt($request->password);
         $img_name=time().'.'.$request->url->getClientOriginalExtension();
         $user->img=$img_name;
         $user->save();
         
         //add role
         $user->roles()->attach(Role::where('name','User')->first());
         /* mov image file*/
         $request->url->move(public_path('img/profile'),$img_name);

         /* login */
         auth()->login($user);

         return back();
       
    }
     public function updateUser(Request $request){
           
           
           $edit=User::find($request->user);

           if (!auth()->attempt($request->only('password')))
           {
               $message='error password.!';
               return compact('message');
           }else{
               $edit->password=bcrypt($request->new_password);
               $edit->name=$request->name;
               $edit->email=$request->email;


             $edit->save();
              

          
               $message='Successful';
               return compact('message');
          
           }
           
           //return back();
    }

      public function updateImg(Request $request){
           $edit=User::find($request->user);
           unlink('img/profile/'.$edit->img);
           $img_name=time().'.'.$request->url->getClientOriginalExtension();
           $edit->img=$img_name;
           $edit->save();
             /* mov image file*/
           $request->url->move(public_path('img/profile'),$img_name);
           return back();
      }
}
