<?php

namespace ToDoList\Contracts;

use ToDoList\Models\ToDo;


/**
 * Class ToDoRepositoryContract
 * @package ToDoList\Contracts
 */
interface ToDoRepositoryContract {

    /**
     * Add a new task to the To Do list
     *
     * @param array $data
     * @return ToDo
     */
    public function createTask(array $data);

    /**
     * List all tasks of the To Do list
     *
     * @return ToDo[]
     */
    public function getToDoList();

    /**
     * Update the status of the task
     *
     * @param int $id
     * @return ToDo
     */
    public function updateTask($id);

    /**
     * Delete a task from the To Do list
     *
     * @param int $id
     * @return ToDo
     */
    public function deleteTask($id);
}