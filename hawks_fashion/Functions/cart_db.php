<?php
function add_to_cart($name, $price, $quantity) {
  global $db;
  $query = 'INSERT INTO cart
                 (productName, itemPrice, quantity)
              VALUES
                 (:name, :price, :quantity)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':quantity', $quantity);
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
  function edit_cart($productID, $quantity)
  {
    global $db;
    $query = '
              UPDATE cart
              SET quantity = :quantity
              WHERE itemID = :productID';
            try {
                $statement = $db->prepare($query);
                $statement->bindValue(':quantity', $quantity);
                $statement->bindValue(':productID', $productID);
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
 ?>
