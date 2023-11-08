<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\User as UserResource; //API File name

use App\Http\Resources\UserCollections as CollectionsUsers; // API File Mame

use App\Models\User; // This is Database Table (Models)




class Apicontroller extends Controller
{
   public function user_page(Request $request, $id ){
    $user = User::find($id); // Database table la irudhu data get panna
    return new UserResource($user); // API file valiya out put kaata 
     
   }

   public function users_page(){
    $users = User::all();
    return new CollectionsUsers($users);
     
   }

}
