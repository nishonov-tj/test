<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tasks = Task::paginate(4);
        return $tasks;
    }
}
