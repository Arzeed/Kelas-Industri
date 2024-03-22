<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\TodoRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\ResponseApi;
use Illuminate\Support\Facades\Validator;
use App\Models\Todo;

class TodoController extends Controller
{
    use ResponseApi;

    public function index()
    {
        $todos = Todo::latest()->get();
        return $this->requestSuccessData('Success!', $todos);
    }
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validated->fails()) {
            return $this->responseValidation('Failed!', $validated->errors());
        }
        $input = $request->only('title', 'description');
        $todo = Todo::create($input);
        return $this->requestSuccessData('Success create todo', $todo, 201);

    }
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validation->fails()) {
            return $this->responseValidation('Failed!', $validation->errors());
        }
        $input = $request->only('title', 'description');
        $todo = Todo::find($id);
        $todo->update($input);
        return $this->requestSuccessData('Success update todo!', $todo, 200);


    }
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return $this->requestSuccess('Success delete todo!');
    }
}