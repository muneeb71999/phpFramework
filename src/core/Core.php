<?php

/**
 * The Core Module of the App
 * Gets the url and parse it to controller and methods
 */

class Core
{
    /**
     * You can override these defalt values in /src/config/config.php
     */
    protected $url;
    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct()
    {

        // Gets the url and parse it
        $this->url = $this->getURL();

        // Get the controller and Instantiate the new class
        $this->getController();

        // Get the current method from the url
        $this->getMethod();

        // Get the parameters from the array
        $this->getParams();

        // Calls a callback with the array of paramters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // Gets the url and parse it
    public function getURL()
    {
        if (isset($_GET['url'])) {

            // Remove the last /
            $url = rtrim($_GET['url'], '/');

            // Sanatize the url
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // Seperate the url on '/'
            $url = explode('/', $url);

            // Return the URL
            return $url;
        }
    }

    // Get the contoroller from the url
    public function getController()
    {

        if (isset($this->url[0])) {
            // Path to the controllers folder
            $isTrue = file_exists("../src/controllers/" . ucwords($this->url[0]) . "Controller.php");

            echo $isTrue;

            // Set the controller if the file exist
            if ($isTrue) {
                $this->currentController = $this->url[0];
                unset($this->url[0]);
            }
        }

        // Require the controller if the file exist and instantiate the controller
        if (file_exists("../src/controllers/" . ucwords($this->currentController) . "Controller.php")) {
            require("../src/controllers/" . ucwords($this->currentController) . "Controller.php");
            $this->currentController = new $this->currentController;
        }
    }

    // Get the current Method from the url
    public function getMethod()
    {

        if (isset($this->url[1])) {
            // Checks if the method exist in the class
            $isTrue = method_exists($this->currentController, $this->url[1]);

            // If Method exists then set the current Method to that method
            if ($isTrue) {
                $this->currentMethod = $this->url[1];
                unset($this->url[1]);
            }
        }
    }

    // Get parameters from the URL
    public function getParams()
    {

        if (isset($this->url[2])) {
            $this->params = $this->url;
        } else {
            $this->params = [];
        }
    }
}
