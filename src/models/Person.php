<?php

class Person extends Database
{

  protected $table = "persons";

  public function getAll()
  {
    $this->query("SELECT * FROM $this->table");
    return $this->getMany();
  }

  public function save($data)
  {
    $name = $data['person_name'];
    $this->query("INSERT INTO $this->table (`name`) VALUES ('$name')");
    // $this->bind(":name", $name);
    return $this->execute();
  }

  public function update($id, $data)
  {
    $name = $data['person_name'];
    $this->query("UPDATE $this->table SET `name` = '$name' WHERE person_id = $id");
    return $this->execute();
  }

  public function delete($id)
  {
    $this->query("DELETE FROM $this->table WHERE person_id = $id");
    return $this->execute();
  }

  public function getById($id)
  {
    $this->query("SELECT * FROM $this->table WHERE person_id = $id");
    return $this->getOne();
  }

  public function totalPersons()
  {
    $this->query("SELECT COUNT(*) as total FROM $this->table");
    return $this->getOne();
  }
}
