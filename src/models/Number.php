<?php

class Number extends Database
{

  protected $table = "customers";

  public function getAll($skip = 0, $records_per_page = 30)
  {
    $this->query("SELECT *, DATE(created_at) as `date` FROM $this->table ORDER BY created_at DESC LIMIT $skip, $records_per_page ");
    return $this->getMany();
  }

  public function getRowCount()
  {
    $this->query("SELECT COUNT(*) as total FROM $this->table");
    return $this->getOne();
  }

  public function getAllSearchResult($number, $person_id = null)
  {
    if ($person_id) {
      $this->query("SELECT *, DATE(created_at) as `date` FROM $this->table WHERE contact_number LIKE '$number%' AND `person_id` = $person_id ORDER BY created_at DESC ");
    } else {
      $this->query("SELECT *, DATE(created_at) as `date` FROM $this->table WHERE contact_number LIKE '$number%' ORDER BY created_at DESC");
    }
    return $this->getMany();
  }

  public function getSearchResultRowCount($number, $person_id = null)
  {
    if ($person_id) {
      $this->query("SELECT *, DATE(created_at) as `date` FROM $this->table WHERE contact_number LIKE '$number%' AND `person_id` = $person_id ORDER BY created_at DESC ");
    } else {
      $this->query("SELECT *, DATE(created_at) as `date` FROM $this->table WHERE contact_number LIKE '$number%' ORDER BY created_at DESC ");
    }
    $this->getMany();
    return $this->rowCount();
  }

  public function save($data)
  {
    $name = $data['customer_name'];
    $number = $data['customer_number'];
    $monthly = $data['customer_monthly'];
    $address = $data['customer_address'];
    $person_id = $data['person_id'];
    $sr_no = $data['sr_no'];

    $this->query("INSERT INTO $this->table (`name`, `contact_number`, `address`, `monthly_payment`, `person_id`, `sr_no`) VALUES ('$name','$number','$address','$monthly','$person_id', '$sr_no')");

    return $this->execute();
  }

  public function update($id, $data)
  {
    $name = $data['customer_name'];
    $number = $data['customer_number'];
    $monthly = $data['customer_monthly'];
    $address = $data['customer_address'];
    $person_id = $data['person_id'];
    $sr_no = $data['sr_no'];

    $this->query("UPDATE $this->table SET 
    `name` = '$name', 
    `contact_number` = '$number', 
    `address` = '$address', 
    `monthly_payment` = '$monthly', 
    `person_id` = $person_id, 
    `sr_no` = '$sr_no'
    WHERE id = '$id'");

    return $this->execute();
  }


  public function delete($id)
  {
    $this->query("DELETE FROM $this->table WHERE id = $id");
    return $this->execute();
  }

  public function getById($id)
  {
    $this->query("SELECT * FROM $this->table WHERE id = $id");
    return $this->getOne();
  }

  public function totalNumbers()
  {
    $this->query("SELECT COUNT(*) as total FROM $this->table");
    return $this->getOne();
  }

  public function search($number)
  {
    $this->query("SELECT * FROM $this->table WHERE contact_number LIKE '$number%' ORDER BY name LIMIT 10  ");
    return $this->getMany();
  }
}
