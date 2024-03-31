<?
require_once 'autoloader.php';
$gestion= new Gestion;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas</title>
</head>
<body>
    <?php echo  $gestion->getBrands(); ?> 
</body>
</html>
