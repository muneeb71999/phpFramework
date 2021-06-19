<?php

/**
 * The Base Controller and every controller should extends this 
 * Controller
 */

class Controller
{
    public function model($model)
    {

        // Require the model 
        require_once("../src/models/$model.php");

        // Instantiate the new model
        return new $model;
    }

    public function view($view, $data = [])
    {

        require_once(APPROOT . "/views/inc/header.php");


        $isTrue = file_exists("../src/views/$view.php");

        if ($isTrue) {
            require_once("../src/views/$view.php");
        } else {
            die("Somthing went wrong please contect your web master");
        }

        require_once(APPROOT . "/views/inc/footer.php");
    }
}
