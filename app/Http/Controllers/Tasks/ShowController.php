<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Task $task)
    {
        return $task;
    }
}
