<?php

class PagesController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "My Framework."
        ];

        $this->view("pages/index", $data);
    }
}
