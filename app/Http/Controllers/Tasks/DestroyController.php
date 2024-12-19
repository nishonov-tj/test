<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Task $task)
    {
        $task->delete();
        return response()->json(['message' => 'Задача удалено'], 200);
    }
}
