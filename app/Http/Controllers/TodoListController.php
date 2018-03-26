<?php

namespace App\Http\Controllers;
use App\TodoList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Support\Facades\DB;
class TodoListController extends Controller {
	public function index() {
        return response(TodoList::all()->jsonSerialize(), Response::HTTP_OK);
        
        
        #$user = DB::table('users')->where('name', 'John')->first();

	}

	public function destroy($id) {
		TodoList::destroy($id);
		return response(null, Response::HTTP_OK);
	}

	public function create(Request $request) {
		$todo = TodoList::create([
			'todo' => request('todo'),
			'user_id' => Auth::user()->id,
		]);



		return redirect('/home');
	}

}
