<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 /*logout_____________________________________________*/
Route::get('/logout', 'sessionController@logout');
/*___________________________________________________*/
/* show All posts ___________________________________________________*/
Route::get('/', 'pagesController@getPosts');


/*show register form___________________________________*/
Route::get('/register', 'pagesController@register');
//registeration
Route::post('/register', 'registerController@register');
/*_____________________________________________________*/


/*show login form________________________________*/
Route::get('/login', 'pagesController@login');

//login
Route::post('/login', 'sessionController@login');
/*_______________________________________________*/

//get post that selected
Route::get('/post/{user_id}/{post_id}', 'pagesController@getPost');


//show posts categories
Route::get('/dep/{name}', 'pagesController@departments');


//search
Route::post('/search', 'pagesController@getResultSearch');
/*____________________________________________________________________*/

//admin roles
Route::group(['middleware'=>'roles','roles'=>['Admin']],function(){
         

/*show user profile_________________________________________________*/
Route::get('/user/{user}', 'pagesController@profile');

//show add post form
Route::get('/addPost', 'pagesController@addPost');

//add post
Route::post('/add-post', 'pagesController@storePost');

//show Edit User Acount form
Route::get('/edit-acount', 'pagesController@editAcount');

//show Edit User Acount form
Route::post('/edit-acount', 'registerController@updateUser');
/*__________________________________________________________________*/

/*show user profile_________________________________________________*/
Route::get('/control', 'pagesController@control');

/*add category_________________________________________*/
Route::post('/add-dep', 'pagesController@storeDep');
/*____________________________________________________________________*/

/*add commint__________________________________________*/
Route::post('/commint', 'pagesController@storeCommint');
/*_____________________________________________________*/

/*add Likes______________________________________*/
Route::get('/like', 'pagesController@storeLike');
/*_______________________________________________*/

/*add-role*/
Route::post('/add-role', 'pagesController@addRole');
/*_______________________________________________*/
});

//editor roles
Route::group(['middleware'=>'roles','roles'=>['Editor','Admin']],function(){
           

/*show user profile_________________________________________________*/
Route::get('/user/{user}', 'pagesController@profile');

//show add post form
Route::get('/addPost', 'pagesController@addPost');

//add post
Route::post('/add-post', 'pagesController@storePost');

//show Edit User Acount form
Route::get('/edit-acount', 'pagesController@editAcount');

//show Edit User Acount form
Route::post('/edit-acount', 'registerController@updateUser');

/*____________________________________________________________________*/

/*add commint__________________________________________*/
Route::post('/commint', 'pagesController@storeCommint');
/*_____________________________________________________*/

/*add Likes______________________________________*/
Route::get('/like', 'pagesController@storeLike');
/*_______________________________________________*/
});

//user roles
Route::group(['middleware'=>'roles','roles'=>['Editor','Admin','User']],function(){ 

/*show user profile_________________________________________________*/
Route::get('/user/{user}', 'pagesController@profile');

//show Edit User Acount form
Route::get('/edit-acount', 'pagesController@editAcount');

//show Edit User Acount form
Route::post('/edit-acount', 'registerController@updateUser');

/*____________________________________________________________________*/

/*add commint__________________________________________*/
Route::post('/commint', 'pagesController@storeCommint');
/*_____________________________________________________*/

/*add Likes______________________________________*/
Route::get('/like', 'pagesController@storeLike');
/*_______________________________________________*/
});



