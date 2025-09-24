<?php

session_start();

if ($_SESSION['logueado']) {

include_once("config_product.php");
include_once("db.class.php");
$link = new Db();
$idUpt= $_GET['q'];
//$sql = "select p.id_product,c.category_name,p.image,p.product_name,p.price, date_format(p.start_date,'%d/%m/%Y') as date from products p inner join categories c on p.id_category=c.id_category";
$sql = "select p.id_product,p.id_category,p.product_name,p.price,p.start_date,p.image, c.category_name from products p inner join categories c on p.id_category=c.id_category where id_product=".$idUpt;
$stmt=$link->run($sql);
$data = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/edit.css">   
</head>

<body>
    <div class="container">
    <div class="row">
     <div class="col-md-12">
                <h3 class="text-center">ACTUALIZAR PRODUCTOS</h3>
    </div>
    <div class="col-md-12">
    <form class="form-group" accept-charset="utf-8" action="update_products.php" method="post">
    <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $data['id_product'] ?>">
    </div>
    <div class="form-group">
        <label class="control-label">NOMBRE</label>
        <input id="nombre" name="nombre" class="form-control" type="text" value="<?php echo $data['product_name'] ?>">  
    </div>
    <div class="form-group">
        <label class="control-label">PRECIO</label>
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input id="precio" name="precio" class="form-control" type="text" value="<?php echo $data['price'] ?>">
            </div>
    </div>
    <div class="form-group">
        <label class="control-label">Categoria</label>
        -- Lista desplegable.
        <select id="categoria" name="categoria" class="form-control">
        <option value="<?php echo $data['id_category'] ?>"> <?php echo $data['category_name'] ?></option>
        </select>
    </div>
   <div class="form-group">
        <label class="control-label">Fecha Ingreso</label>
        <input id="nombre" name="fecha" class="form-control" type="date" value="<?php echo $data['start_date'] ?>">
    </div>
    <div class="form-group">
        <label class="control-label">imagen</label>
        <input id="image" name="image" class="form-control" type="url" value="<?php echo $data['image'] ?>">
         <small class="form-text text-muted">
                Ingrese la URL completa de la imagen del producto
         </small>
    </div>
    <div class="text-center">
             <br>
             <input type="submit" class="btn btn-success" value="Guardar Producto">
    </div>
    </form>
    </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>