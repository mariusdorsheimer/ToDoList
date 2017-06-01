<?php

namespace ToDoList\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Templates\Twig;
use ToDoList\Contracts\ToDoRepositoryContract;
use Plenty\Plugin\Log\Loggable;



/**
 * Class ContentController
 * @package ToDoList\Controllers
 */
class ContentController extends Controller {

    use Loggable;

    /**
     * @param Twig $twig
     * @param ToDoRepositoryContract $toDoRepo
     * @return string
     */
    public function showToDo(Twig $twig, ToDoRepositoryContract $toDoRepo) {

        $toDoList     = $toDoRepo->getToDoList();
        $templateData = array("tasks" => $toDoList);

        return $twig->render('ToDoList::content.todo', $templateData);
    }

    /**
     * @param  \Plenty\Plugin\Http\Request $request
     * @param ToDoRepositoryContract $toDoRepo
     * @return string
     */
    public function createToDo(Request $request, ToDoRepositoryContract $toDoRepo) {

        $newToDo = $toDoRepo->createTask($request->all());

        $this->getLogger('ContentController_createToDo')
             ->error('ToDoList::migration.createToDoInformation');

        return json_encode($newToDo);
    }

    /**
     * @param int $id
     * @param ToDoRepositoryContract $toDoRepo
     * @return string
     */
    public function updateToDo($id, ToDoRepositoryContract $toDoRepo) {

        $updateToDo = $toDoRepo->updateTask($id);

        return json_encode($updateToDo);
    }

    /**
     * @param int $id
     * @param ToDoRepositoryContract $toDoRepo
     * @return string
     */
    public function deleteToDo($id, ToDoRepositoryContract $toDoRepo) {

        $deleteToDo = $toDoRepo->deleteTask($id);

        return json_encode($deleteToDo);
    }
}