<?php

class DATABASE
{
  private $host = 'localhost';
  private $username = 'root';
  private $password = '';
  private $db = 'crud_oop';
  public $conn;

  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);
    if (!$this->conn) {
      echo "failed" . mysqli_connect_error();
    }
  }

  public function insertData($post = array())
  {
    $name = $this->conn->real_escape_string($post['name']);
    $email = $this->conn->real_escape_string($post['email']);
    $age = $this->conn->real_escape_string($post['age']);
    $query = "INSERT INTO users(`name`,`email`,`age`) VALUES('$name' , '$email' ,'$age')";
    $result = $this->conn->query($query);
    if (!$result) {
      echo "failed" . mysqli_connect_error();
    } else {
      header("location:index.php?msg1=insert");
    }
  }

  public function selectData()
  {
    $query = "SELECT * FROM users";
    $result = $this->conn->query($query);
    if (!$result) {
      echo "failed" . mysqli_connect_error();
    } else {
      $data = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }
    }
    return $data;
  }

  public function displayRecord($id)
  {
    $query = "SELECT * FROM users WHERE `id` = '$id';";
    $result = $this->conn->query($query);
    if (!$result) {
      echo "failed" . mysqli_connect_error();
    } else {
      $row = mysqli_fetch_assoc($result);
    }
    return $row;
  }

  public function updateRecord($postData)
  {
    $id = $this->conn->real_escape_string($_GET['id']);
    $name = $this->conn->real_escape_string($postData['name']);
    $email = $this->conn->real_escape_string($postData['email']);
    $age = $this->conn->real_escape_string($postData['age']);

    $query = "UPDATE users SET `name` = '$name' , `email` = '$email' , `age` = '$age' WHERE `id` ='$id'";
    $result = $this->conn->query($query);
    if (!$result) {
      echo "failed" . mysqli_connect_error();
    } else {
      header("location:index.php?msg2=update");
    }
  }

  public function deleteRecord($id)
  {
    $query = "DELETE FROM users WHERE `id` = '$id'";
    $result = $this->conn->query($query);
    if (!$result) {
      echo "failed" . mysqli_connect_error();
    } else {
      header("location:index.php?msg3=delete");
    }
  }
}
