<?php
  function add_new_product($name, $description, $price, $quantity, $img) {
    global $db;
    $query = 'INSERT INTO products
                   (productName, description, itemPrice, quantity, img)
                VALUES
                   (:name, :description, :price, :quantity, :img)';
      try {
          $statement = $db->prepare($query);
          $statement->bindValue(':name', $name);
          $statement->bindValue(':description', $description);
          $statement->bindValue(':price', $price);
          $statement->bindValue(':quantity', $quantity);
          $statement->bindValue(':img', $img);
          $statement->execute();
          $statement->closeCursor();

          // Get the last product ID that was automatically generated
          $product_id = $db->lastInsertId();
          return $product_id;
      } catch (PDOException $e) {
          $error_message = $e->getMessage();
          display_db_error($error_message);
      }
  }

  function edit_product($productID, $name, $description, $price, $quantity, $img)
  {
    global $db;
    $query = '
              UPDATE products
              SET productName = :name,
                  description = :description,
                  itemPrice = :price,
                  quantity = :quantity,
                  img = :img
              WHERE productID = :productID';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':name', $name);
                $statement->bindValue(':description', $description);
                $statement->bindValue(':price', $price);
                $statement->bindValue(':quantity', $quantity);
                $statement->bindValue(':productID', $productID);
                $statement->bindValue(':img', $img);
                $statement->execute();
                $statement->closeCursor();

            }catch (PDOException $e) {
                $error_message = $e->getMessage();
            }
    }

  function delete_product($product_id)
  {
    global $db;
    $query = 'DELETE FROM products WHERE productID = :product_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':product_id', $product_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

  function get_product($product_id)
  {
    global $db;
    $query = 'SELECT *
              FROM products
              WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
  }
?>
