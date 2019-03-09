<?php

namespace App\Http\Controllers;

use App\Todo\Model\Todo as TodoModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * @return TodoModel[]
     */
    public function index()
    {
        return TodoModel::all();
    }

    /**
     * @param Request $request
     * @return TodoModel
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|min:5'
        ]);

        /** @var TodoModel $todo */
        $todo = TodoModel::query()->create($request->only('text'));

        return TodoModel::query()->find($todo->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  TodoModel $todo
     * @return TodoModel
     */
    public function show(TodoModel $todo)
    {
        return $todo;
    }

    /**
     * @param Request $request
     * @param TodoModel $todo
     * @return TodoModel
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, TodoModel $todo)
    {
        $this->validate($request, [
            'text' => 'filled|min:5',
            'completed' => 'required_without:text|boolean'
        ]);

        $todo->update($request->all());

        return $todo->find($todo->id);
    }

    public function destroy(TodoModel $todo)
    {
        $todo->delete();

        return response()->json([]);
    }
}
