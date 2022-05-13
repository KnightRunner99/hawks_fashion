<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style type="text/css">
      .table
      {
          margin-left: auto;
          margin-right: auto;
          text-align: center;
          width: 80%;
      }

      td
      {
        text-align: left;
      }

      .header
      {
          margin: auto;
          width: 90%;
          display: flex;
          align-items: center;
          justify-content: space-between;
      }

      .heading
      {
        font-size: 22px;
        font-weight: bold;
        color: #DF5336;
      }

      .bold
      {
        font-weight: bold;
      }
      .buttons
        {
          display: inline-block;
          width: 200px;
        }
  </style>
</head>
<body>

<?php
session_start();
include 'Functions/ezdubsdatabase.php';
include_once 'Functions/products_db.php';

  $items = array();
  $total = 0.0;
  $total_unformatted=0.0;

if(!empty($_SESSION['id']))
{
  echo '<div class = "header">
    <h2 class = "heading">Your Shopping Cart</h2>
  </div>
  <div class="header">
  <p>These are the items you appear to be interested in! Proceed to checkout or select continue shopping.</p>
  </div>';
  foreach ($_SESSION['id'] as $product_id => $quantity ) {
      // Get product data from db
      $product = get_product($product_id);
      $price = $product['itemPrice'] ?? NULL;
      $quantity = intval($quantity);
      // Store data in items array
      $items[$product_id]['name'] = $product['productName'] ?? NULL;
      $items[$product_id]['description'] = $product['description'] ?? NULL;
      $items[$product_id]['quantity'] = $quantity ?? NULL;
      $items[$product_id]['price'] = $price ?? NULL;
      $total_unformatted += $price * $quantity;
      $total = number_format($total_unformatted, 2);
    }
$display = '<table class="table">';
$display .="<tr>
  <td class='bold'>Item</td>
  <td class='bold'>Description</td>
  <td class='bold'>Quantity</td>
  <td class='bold'>Price</td>
</tr>";
foreach ($items as $itemdesc)
{
  $display.="<tr>";
  foreach($itemdesc as $desc)
  {
    $display.="<td>" . $desc . "</td>";
  }
  $display .= "</tr>";
}
$display.="<tr>
        <td class='bold'>SubTotal</td>
        <td></td>
        <td></td>
        <td class='bold'>$" . $total . "</td>";
$display.='</table>';
echo $display;
}
else {
  echo "<h1>Your Cart is Empty!</h1>";
}
?>

<form action="product_page.php">
<button type= "submit" class="btn btn-primary buttons">Continue Shopping</button>
</form>

<form method="post" action="checkouttemppage.php">
<button type = "submit" class="btn btn-danger buttons" value=<?php echo $total?> name="checkout">Proceed to Checkout</button>
</form>
</body>
</html>
