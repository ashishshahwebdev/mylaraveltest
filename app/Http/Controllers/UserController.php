<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller{


	function list(Request $request){
		$result = [];
		
		$users = User::all();

		if(isset($users)){
			foreach ($users as $user_data) {
				$result[] = ["name" => $user_data->name, "email" => $user_data->email];
			}
		}

		return response($result);
	}

}