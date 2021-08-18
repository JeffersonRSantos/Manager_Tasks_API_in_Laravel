<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskStatusController extends Controller
{
    public function index()
    {
       return json_encode(Tasks::done(), 200);
    }

    public function completed()
    {
        try {
            Tasks::find(Request('id'))->update(["done" => true]);
            return json_encode(["success" => "Status change with success."], 200);
        } catch (\Exception $e) {
            return json_encode(["error" =>  "Error to change status."],404);
        }
    }

    public function restore()
    {
        try {
            Tasks::find(Request('id'))->update(["done" => false]);
            return json_encode(["success" => "Restore task with success."], 200);
        } catch (\Exception $e) {
            return json_encode(["error" =>  "Error to restore task: status 404."],404);
        }
    }
}
