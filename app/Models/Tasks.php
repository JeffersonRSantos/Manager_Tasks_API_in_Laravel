<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'tarefas';

    protected $fillable = [
        'name',
        'description',
        'done',
        'priority'
    ];

    public function scopeDone($query)
    {
        return $query->whereRaw("done = true ORDER BY CASE priority WHEN 'high' THEN 1 WHEN 'medium' THEN 2 WHEN 'low' THEN 3 END")->get();
    }

    public function scopeFilterTasks($query, $params)
    {
        return $query->where('name', 'like', '%'.$params.'%')->get();
    }

    public function scopeOnlyNoDone($query)
    {
        return $query->whereRaw("done = false ORDER BY CASE priority WHEN 'high' THEN 1 WHEN 'medium' THEN 2 WHEN 'low' THEN 3 END")->get();
    }
}
