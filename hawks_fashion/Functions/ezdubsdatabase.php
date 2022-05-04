<?php
$dsn = 'mysql:host=localhost;dbname=ezdubsdatabase';

try {
    $db = new PDO($dsn, "ezdubs", "ezdubspass");
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message; 
}
?>
