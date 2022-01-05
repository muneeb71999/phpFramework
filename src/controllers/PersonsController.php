<?php

class Persons extends Controller
{

  public function __construct()
  {
    $this->model = $this->model("Person");
  }

  public function index()
  {
    $persons = $this->model->getAll();

    $data = [
      'persons' => $persons
    ];

    $this->view("persons/index", $data);
  }

  public function edit($id)
  {
    $person = $this->model->getById($id);

    $data = [
      'person' => $person
    ];

    return $this->view("persons/edit", $data);
  }

  public function update($id)
  {

    if (!isset($_POST['person_name']) || empty($_POST['person_name'])) {
      return header("Location: " . URLROOT . "/persons/edit/$id");
    }

    // Create the person
    $this->model->update($id, $_POST);

    // redirect to persons page
    header("Location: " . URLROOT . "/persons");
  }

  public function create()
  {
    $this->view("persons/create");
  }

  public function save()
  {

    if (!isset($_POST['person_name']) || empty($_POST['person_name'])) {
      return $this->view("persons/create", [
        'person_name_error' => "Please fill this information"
      ]);
    }

    // Create the person
    $this->model->save($_POST);

    // redirect to persons page
    header("Location: " . URLROOT . "/persons");
  }

  public function delete($id)
  {
    try {
      $this->model->delete($id);
      header("Location: " . URLROOT . "/persons");
    } catch (PDOException $e) {
      header("Location: " . URLROOT . "/persons");
    }
  }
}
