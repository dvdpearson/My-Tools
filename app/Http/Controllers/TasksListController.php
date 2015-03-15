<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class TasksListController extends Controller {

    var $tasks;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
        $this->tasks = Task::all();
		$this->middleware('guest');
	}

	/**
	 * Show the tasks list
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('pages/tasks')->with('tasks', $this->tasks);
	}

    public static function validateTask($task)
    {
        if (empty($task['name']) || $task['name'] === null) {
            return false;
        }
        return true;
    }

    public function store()
    {
        $task = Input::all();
        if (self::validateTask($task)) {
            Task::create($task);
            $this->tasks = Task::all();
            return view('pages/tasks')->with([
                'tasks' => $this->tasks,
                'success' => true
            ]);
        } else {
            return view('pages/tasks')->with([
                'tasks' => $this->tasks,
                'error' => true
            ]);
        }
    }

    /**
     * Add a task in the database
     *
     * @return boolean
     */
    public function addTask(Request $request)
    {
        $task = new Task;
        $task->name = $request->input('task_name');
        return $task->save();
    }

    /**
     * Delete a task in the database
     *
     * @return boolean
     */
    public function deleteTask($id)
    {
        $task = Task::find($id);
        return $task->delete();
    }

}
