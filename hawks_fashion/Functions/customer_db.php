<?php

function valid_login($email, $password)
{

}

function add_new_customer($firstname, $lastname, $email, $username, $password) {
  global $db;
  $query = 'INSERT INTO customer_info
                 (firstName, lastName, emailAddress, username, password)
              VALUES
                 (:firstname, :lastname, :email, :username, :password)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':firstname', $firstname);
        $statement->bindValue(':lastname', $lastname);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
    }
}

function delete_customer($customer_id)
{
  global $db;
  $query = 'DELETE FROM customer_info WHERE customerID = :customer_id';
      try {
          $statement = $db->prepare($query);
          $statement->bindValue(':customer_id', $customer_id);
          $statement->execute();
          $statement->closeCursor();
      } catch (PDOException $e) {
          $error_message = $e->getMessage();
          echo $error_message;
      }
  }

  function edit_customer($customerID, $firstname, $lastname, $email, $password)
  {
    global $db;
    $query = '
              UPDATE customer_info
              SET   firstName = :firstname,
                    lastName = :lastname,
                    emailAddress = :email,
                    password = :pass
              WHERE customerID = :customerID';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':firstname', $firstname);
                $statement->bindValue(':customerID', $customerID);
                $statement->bindValue(':lastname', $lastname);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':pass', $password);
                $statement->execute();
                $statement->closeCursor();

            }catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
            }
    }

function get_customer($customer_id) {
    global $db;
    $query = 'SELECT * FROM customer_info WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

 ?>
