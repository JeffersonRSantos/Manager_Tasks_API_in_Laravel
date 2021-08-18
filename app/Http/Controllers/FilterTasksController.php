<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class FilterTasksController extends Controller
{
    public function index(Request $request){
        try {
            $tasks_filter = Tasks::filterTasks($request->get('name'));
            return json_encode($tasks_filter,200);
        } catch (\Exception $th) {
            return json_encode(["error" => "Error to filter tasks"],404);
        };
    }
}
