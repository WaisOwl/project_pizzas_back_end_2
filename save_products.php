
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    </head>
    <body>
<?php

try{
if (empty($_POST['producto']) || empty($_POST['precio']) || empty($_POST['categoria'])) {
    throw new Exception("Faltan datos del producto.");
}
$product=$_POST['producto']; //sacacos de los 'name'
$price=$_POST['precio'];
$category=$_POST['categoria'];

include_once("config_product.php");
include_once("db.class.php");
$link = new Db();
include_once("upload.class.php");
$upload = new Upload();
// Ruta completa de la imagen subida al servidor.
$path_img= $upload->uploadImage();
$sql = "INSERT INTO products (id_category, price, product_name, image) values (?,?,?,?)";
$stmt=$link->run($sql,[$category,$price,$product,$path_img]);

}catch(Exception $e){
echo "Error al insertar el producto.";

}

?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
    bootbox.alert({

    title: 'Insertar',
    message: 'Producto insertado correctamente',
    callback: function() {
        window.location.href = 'insert_products.php';
    }
    });

    });    
</script>
    </body>
</html>
