<?php

use Illuminate\Support\Facades\Route;
use Illuminate\support\Facades\DB;
use App\Models\login;
// use App\Models\Posts;
// use Illuminate\Http\Request;
// uas Illumnate\foundation\\Application;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/veiw', function () {
    $url = route('about.veiw');
    return "This is a routing page";
});
Route::get("/home/{id}/{name}", function ($id,$name) {
    return "This is a id .$id. Name: .$name";
});
use App\Http\Controllers\PostsController;
use App\Http\Controllers\textcontroller;
Route::get("Post/index/{id}/{name}",[PostsController::class,'index']);
Route::get('contact',[PostsController::class,'contact']);
Route::get('test',[textController::class,'text']);


// //CRUD Commands in MYSQL
// //insert data to database through Query way.
// Route::get('insert',function(){
// DB::table('login')->insert(['name'=>'hafiz','email'=>'hafiz@gmail.com','password'=>'hafiz@123']);
// return 'insert a record successfuly';
// });
Route::get('insertt',function(){
DB::insert('insert into login(name,email,password) values(?,?,?)',['hafiz','habibhafiz@gmail.com','hafiz@123']);
return 'insert a record two successfuly';
});
// //insert data to database through Query way END.

// //Read record From database through Query way.
// Route::get('read',function(){
//     $query = DB::select('select * from login where id = ?',[2]);
//     foreach($query as $readd){
//         return $readd->Name;
//         // return 'readed the datas';
//     }
// });
// //Read record From database through Query way END.
// //Update Record in database through Query way.
// Route::get('update',function(){
//    $query = DB::update('update login set name="Abdullah" where id=3');
//     return response('The '.$query.' Record is updated');
// });
// //Update Record in database through Query way END.
// //Delete Record from a dattabase table through query way.
// Route::get('delete',function(){
//    $querry = DB::delete('delete from login where id = 2');
//     return response('The '.$querry.'Record is deleted');
// });
// //Delete Record from a dattabase table through query way END.

//Read date from table by dynamic way.php


//Read date from table by dynamic way.
Route::get('login',[LoginController::class,'index']);
Route::get('create',function(){
    $Login = new login;
    $Login->name = 'salim';
    $Login->email = 'Salim@gmail.com';
    $Login->Password = 'Salim@90';
    $Login->save();
    return 'Record is inserted to login table';
});
// Route::get('updatee',function(){
//     $Login = login::find(2);
//     $Login->name = 'salimi';
//     $Login->email = 'Salim@gmail.com';
//     $Login->Password = 'mansoor@90';
//     $Login->save();
//     return 'Record is updated in login table';
// });
Route::get('deleted',function(){
    $login = login::find(2);
    $login->delete();
});
Route::get('deleted',function(){
    // $login = login::find(2);
    // $login->delete();

    // login::destroy(1,2,3);

    // login::where('id',1)->delete();

});
Route::get('softdelete/{id}',function($id){
    $logins = login::find($id);
    $logins->delete();

});
Route::get('readdd',function(){
    $logins = login::all();
    return $logins;

});
Route::get('softreaddd',function(){
    $logins = login::withTrashed()->get();
    return $logins;

});
Route::get('softreadonly',function(){
    $logins = login::onlyTrashed()->get();
    return $logins;

});
Route::get('softrestore',function(){
    $logins = login::withTrashed()->find(1);
    $logins->restore();

});

