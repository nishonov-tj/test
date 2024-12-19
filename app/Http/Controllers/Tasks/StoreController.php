<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Models\Task;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $task = Task::create($data);
        return response()->json($task, 201);
    }
}
