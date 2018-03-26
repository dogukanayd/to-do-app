<?php

namespace App\Http\Controllers;
use App\TodoList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class TodoListController extends Controller {
	public function index() {
		return response(TodoList::all()->jsonSerialize(), Response::HTTP_OK);
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
