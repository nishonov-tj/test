<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Task $task)
    {
        $data = $request->validated();
        $task->update($data);
        return response()->json(['message' => 'Задача обновлено'], 200);
    }
}
