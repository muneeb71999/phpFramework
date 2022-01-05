<?php

class Numbers extends Controller
{

  public function __construct()
  {
    $this->model = $this->model("Number");
  }

  public function index($page = 1)
  {

    if ($page <= 0) {
      $page = 1;
    }

    $records_per_page = 30;

    $totalRecords = $this->model->getRowCount()['total'];

    $totalPages = ceil($totalRecords / $records_per_page);

    if ($page > $totalPages) $page = $totalPages;

    $skip = ($page - 1) * $records_per_page;

    $persons = $this->model("Person")->getAll();

    $numbers = $this->model->getAll(abs($skip), $records_per_page);

    // By Default the Pagination will be false
    $paginationRequired = false;

    if ($records_per_page < $totalRecords) {
      $paginationRequired = true;
    }

    $data = [
      'numbers' => $numbers,
      'persons' => $persons,
      'is_pagination' => $paginationRequired,
      'totalPages' => $totalPages,
      'currentPage' => $page,
      'method' => 'index'
    ];

    $this->view("numbers/index", $data);
  }

  public function create()
  {

    $persons = $this->model("Person")->getAll();

    $data = [
      'persons' => $persons,
    ];

    $this->view("numbers/create", $data);
  }

  public function delete($id)
  {
    $this->model->delete($id);
    return header("Location: " . URLROOT . "/numbers");
  }

  public function save()
  {
    $data = [];

    $persons = $this->model("Person")->getAll();

    if (!isset($_POST['customer_name']) || empty($_POST['customer_name'])) {
      $data['customer_name_error'] = "Please fill this information";
    }

    if (!isset($_POST['customer_number']) || empty($_POST['customer_number'])) {
      $data['customer_number_error'] = "Please fill this information";
    }

    if (!isset($_POST['customer_address']) || empty($_POST['customer_address'])) {
      $data['customer_address_error'] = "Please fill this information";
    }

    if (!isset($_POST['sr_no']) || empty($_POST['sr_no'])) {
      $data['sr_no_error'] = "Please fill this information";
    }

    $data['customer_name'] = $_POST['customer_name'];
    $data['customer_number'] = $_POST['customer_number'];
    $data['customer_monthly'] = $_POST['customer_monthly'];
    $data['customer_address'] = $_POST['customer_address'];
    $data['person_id'] = $_POST['person_id'];
    $data['persons'] = $persons;
    $data['sr_no'] = $_POST['sr_no'];

    if (empty($data['customer_name_error']) && empty($data['customer_number_error']) && empty($data['customer_address_error'])) {
      $this->model->save($data);
      return header("Location: " . URLROOT . "/numbers");
    }

    return $this->view("numbers/create", $data);
  }

  public function edit($customer_id)
  {
    $customer = $this->model->getById($customer_id);
    $persons = $this->model('person')->getAll();

    $data = [
      'id' => $customer['id'],
      'sr_no' => $customer['sr_no'],
      'customer_name' => $customer['name'],
      'customer_number' => $customer['contact_number'],
      'customer_address' => $customer['address'],
      'customer_monthly' => $customer['monthly_payment'],
      'person_id' => $customer['person_id'],
      'create_at' => $customer['created_at'],
      'persons' => $persons
    ];


    return $this->view('numbers/edit', $data);
  }

  public function update($id)
  {
    // return print_r($_POST);

    $data = [];

    $persons = $this->model("Person")->getAll();

    if (!isset($_POST['customer_name']) || empty($_POST['customer_name'])) {
      $data['customer_name_error'] = "Please fill this information";
    }

    if (!isset($_POST['customer_number']) || empty($_POST['customer_number'])) {
      $data['customer_number_error'] = "Please fill this information";
    }

    if (!isset($_POST['customer_address']) || empty($_POST['customer_address'])) {
      $data['customer_address_error'] = "Please fill this information";
    }

    if (!isset($_POST['sr_no']) || empty($_POST['sr_no'])) {
      $data['sr_no_error'] = "Please fill this information";
    }

    $data['customer_name'] = $_POST['customer_name'];
    $data['customer_number'] = $_POST['customer_number'];
    $data['customer_monthly'] = $_POST['customer_monthly'];
    $data['customer_address'] = $_POST['customer_address'];
    $data['person_id'] = $_POST['person_id'];
    $data['persons'] = $persons;
    $data['sr_no'] = $_POST['sr_no'];

    if (empty($data['customer_name_error']) && empty($data['customer_number_error']) && empty($data['customer_address_error'])) {
      $this->model->update($id, $data);
      return header("Location: " . URLROOT . "/numbers");
    }

    // Some Error Occurend Reload the same page
    return $this->view("numbers/edit", $data);
  }


  public function renderSearch($page = 1)
  {
    $numbers = [];

    if (isset($_POST['person_id']) && isset($_POST['number'])) {
      $_SESSION['person_id'] = $_POST['person_id'];
      $_SESSION['number'] = $_POST['number'];
      if ($_POST['person_id'] == -1 && !empty($_POST['number'])) {
        $numbers = $this->model->getAllSearchResult($_POST['number'], '');
      } else if (!empty($_POST['number']) || $_POST['person_id'] != -1) {
        $numbers = $this->model->getAllSearchResult($_POST['number'], $_POST['person_id']);
      } else {
        return header("Location: " . URLROOT . "/numbers");
      }
    } else {
      return header("Location: " . URLROOT . "/numbers");
    }

    $persons = $this->model("Person")->getAll();

    $data = [
      'numbers' => $numbers,
      'persons' => $persons,
      'is_pagination' => false,
      'currentPage' => $page,
      'method' => 'renderSearch'
    ];

    $this->view("numbers/index", $data);
  }

  public function search($number)
  {

    $numbers = $this->model->search($number);

    if (!$numbers) {
      echo json_encode([]);
      return;
    }

    echo json_encode($numbers);
  }
}
