<?php

class TasksTest extends TestCase {

	public function testAddEmptyTaskName()
	{
        $object = new App\Http\Controllers\TasksListController;
        $validation = $object::validateTask(
            ['name' => '']
        );
        $this->assertFalse($validation);
	}

    public function testAddNullTaskName()
    {
        $object = new App\Http\Controllers\TasksListController;
        $validation = $object::validateTask(
            ['name' => null]
        );
        $this->assertFalse($validation);
    }

    public function testAddAValidNewTask()
    {
        $object = new App\Http\Controllers\TasksListController;
        $validation = $object::validateTask(
            ['name' => 'test']
        );
        $this->assertTrue($validation);
    }

}
