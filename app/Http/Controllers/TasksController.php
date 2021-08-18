<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Http\Requests\TasksRequest;

class TasksController extends Controller
{
    public function index()
    {
        try{
            $tasks = Tasks::onlyNoDone();
            //return all tasks
            return json_encode($tasks, 200);        
        }catch(\Exception $e){
            return json_encode([
                "error" => "Error to get tasks"
            ]);
        }
    }

    public function store(TasksRequest $request, Tasks $tasks)
    {
        try{
            $input = $request->all();
            $input['done'] = false;

            $tasks->create($input);

            return json_encode(['success' => 'Register task'], 200);
        }catch(\Exception $e){
            return json_encode(["error" => "Error to create tasks"], 404);
        }
    }

    public function edit(Tasks $tasks, $id)
    {
        try {
            $task = $tasks->find($id);
            return json_encode($task, 200);
        }catch(\Exception $e){
            return json_encode(["error" => "Error to edit task"], 404);
        }
    }

    public function update(Request $request, Tasks $tasks, $id)
    {
        try {
            $task = $tasks->find($id)->update($request->all());
            return json_encode(["success" => "Updated task"], 200);
        }catch(\Exception $e){
            return json_encode(["error" => "Error to update task"], 404);
        }
    }

    public function destroy($id)
    {
        try{
            Tasks::find($id)->delete();
            return json_encode(["success" => "Delete task with success."] ,200);
        }catch(\Exception $e){
            return json_encode(["error" => "Error to delete task."],404);
        }
    }
}
