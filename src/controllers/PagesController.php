<?php

class Pages extends Controller
{
    public function index()
    {
        $data = [
            "title" => "My Framework.",
            "totalPersons" => $this->model("Person")->totalPersons()['total'],
            "totalCustomers" => $this->model("Number")->totalNumbers()['total'],
        ];

        $this->view("pages/index", $data);
    }
}
