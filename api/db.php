<?php
	// Include config.php file
	include_once 'config.php';

	// Create a class Users
	class Database extends Config {
	  // Fetch all or a single user from database
	  public function fetch($id = 0) {
	    $sql = 'SELECT * FROM users';
	    if ($id != 0) {
	      $sql .= ' WHERE id = :id';
	    }
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['id' => $id]);
	    $rows = $stmt->fetchAll();
	    return $rows;
	  }

	  // Insert an user in the database
	  public function insert($name, $email, $phone) {
	    $sql = 'INSERT INTO users (name, email, mobile) VALUES (:name, :email, :mobile)';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['name' => $name, 'email' => $email, 'mobile' => $mobile]);
	    return true;
	  }

	  // Update an user in the database
	  public function update($name, $email, $mobile, $id) {
	    $sql = 'UPDATE users SET name = :name, email = :email, mobile = :mobile WHERE id = :id';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['name' => $name, 'email' => $email, 'mobile' => $mobile, 'id' => $id]);
	    return true;
	  }

	  // Delete an user from database
	  public function delete($id) {
	    $sql = 'DELETE FROM users WHERE id = :id';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['id' => $id]);
	    return true;
	  }
	}

?>