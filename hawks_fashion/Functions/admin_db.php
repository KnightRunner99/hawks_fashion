<?php
function add_new_admin($email, $password, $firstname, $lastname) {
  global $db;
  $query = '
              INSERT INTO admin
                 (emailAddress, password, firstName, lastName)
              VALUES
                 (:email, :password, :firstname, :lastname)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':firstname', $firstname);
        $statement->bindValue(':lastname', $lastname);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
    }
}

function delete_admin($admin_id)
{
  global $db;
  $query = 'DELETE FROM admin WHERE adminID = :admin_id';
      try {
          $statement = $db->prepare($query);
          $statement->bindValue(':admin_id', $admin_id);
          $statement->execute();
          $statement->closeCursor();
      } catch (PDOException $e) {
          $error_message = $e->getMessage();
          echo $error_message;
      }
  }

  function edit_admin($adminID, $firstname, $lastname, $email)
  {
    global $db;
    $query = '
              UPDATE customer_info
              SET   firstName = :firstname,
                    lastName = :lastname,
                    emailAddress = :email
              WHERE adminID = :adminID';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':firstname', $firstname);
                $statement->bindValue(':adminID', $adminID);
                $statement->bindValue(':lastname', $lastname);
                $statement->bindValue(':email', $email);
                $statement->execute();
                $statement->closeCursor();

            }catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
            }
    }
?>
