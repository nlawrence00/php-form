<?php
$phpSelf = htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES, "UTF-8");

$path_parts = pathinfo($phpSelf);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PHP: Form Example</title>

        <meta charset="utf-8">
        <meta name="author" content="Put our name here">
        <meta name="description" content="Mark me wrong for not changing this">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/custom.css?version=1.0" type="text/css" media="screen">

    </head>
<!-- ######################       Body Section       #####################/# -->     
<?php
print '<body id="' . $path_parts['filename'] . '">' . PHP_EOL;

include 'header.php';
print  PHP_EOL;

include 'nav.php';
print  PHP_EOL;
?>

<!-- ######################       Main Section       ####################### -->