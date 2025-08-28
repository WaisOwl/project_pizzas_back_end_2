<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Pizze il Napolitano</title>
    <meta name="description" content="Descubrí las pizzas más ricas de San Martin que esta en la Provincia de Buenos Aires. Masa artesanal, ingredientes frescos y sabores únicos que conquistarán tu paladar. ¡Pedí ya y disfrutá en casa!">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div id="header-container">
            <div id="logo">
                <img src="img/pizza.svg" alt="logo de la pizzeria">
                <img src="img/text.svg" class="logo-text" alt="Pizzeria Pizze il Napolitano">
            </div>
            <nav>
                <ul> 
                      <!-- nav>ul>li*4>a  -->
                    <li> <a href="#">HOME</a></li>
                    <li> <a href="nosotros.html">NOSOTROS</a></li>
                    <li> <a href="sucursales.html">SUCURSALES & DELIVERY</a></li>
                    <li> <a href="contacto.html">CONTACTO</a></li> 
                </ul>    
            </nav>    
        </div>       
    </header>
    <div class="main-content">
        <!-- https://animate.style/ -->
        <h2 class="animate__animated animate__backInLeft">NUESTRAS PIZZAS</h2>
        <div id="cart">
            <div id="subtotal">
                <p>Total: $<span id="total-amount">0</span></p>
            </div>
            <!-- https://fontawesome.com/search?ic=free -->
            <i class="fa badge" id="badge" value="0"><i class="fa-solid fa-cart-shopping fa-lg"></i></i>
        </div>  
        <ul class="gallery">

<?php
include_once("config_product.php");
include_once("db.class.php");
$link=new Db();
$sql="SELECT products.id_product, products.image, products.price, products.product_name, products.start_date, categories.category_name FROM products 
INNER JOIN categories ON products.id_category = categories.id_category";
$stmt=$link->run($sql);
$data=$stmt->fetchAll();
//recuperar un producto y llevarlo al li
foreach($data as $row){
?>
<li>
 <div class="box">
<figure><img src="<?php echo $row['image']  ?>" class="img-pizzas">
 <figcaption>
 <h3><?php echo $row['product_name'] ?></h3>
   <p><?php echo $row['price'] ?></p>
   <time><?php echo $row['start_date'] ?></time>          
   </figcaption>
  </figure>
 <button class="button" value=<?php echo $row['id_product']  ?>" data-price="<?php echo $row['price']  ?>">Añadir al carrito
      <i class="fa-solid fa-cart-shopping fa-lg"></i>
       </button>
</div>
</li>
<?php
}

?>

        </ul>
    </div>
    <footer>
        <div class="footer-content">
        <div class="footer-nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Sucursales & Delivery</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="login.html">LOGIN</a></li>
                <li><a href="#">Política de Privacidad</a></li>
            </ul>
        </div>
         <!-- Redes sociales -->
            <div class="footer-social" id="social">
                <a href="https://www.facebook.com/user"><i class="fab fa-facebook-f"></i></a>
                <a href="https://x.com/user"></a><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/user"></a><i class="fab fa-instagram"></i></a>
            </div>

            <div class="footer-copyright">
                <p>&copy; 
                <script>
                let currentYear= new Date().getFullYear();
                document.write(currentYear);
                </script> Mi Sitio Web. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer> 

    <script>
    const countButtons=document.querySelectorAll("button").length;
    let products=[];
    // cantidad de buttons que haya en la pagina agregados o por agregar
    let totalPrice = 0;

    for(let i=0;i<countButtons;i++){
    document.querySelectorAll("button")[i].addEventListener("click",showValue);
    }

    function showValue(){
    // Se hizo un click sobre el Button para comprar una Pizza//
    
    const price=parseFloat(this.getAttribute("data-price"));

    if(products.includes(this.value)){
    // Si el producto ya está en el arreglo, no tendria que seleccionar el mismo producto.
    return;
    }
    else{
    // Cambiar color a Rojo
    this.style.backgroundColor = "#e50c39";
    this.innerHTML=`Agregado <i class="fa-solid fa-cart-shopping"></i>`;
    products.push(this.value);  

    console.log(products);

    totalPrice=totalPrice+price;

    console.log('Total: $' + totalPrice);

    document.getElementById("badge").setAttribute("value",products.length);
    // cambia el valor de la cantidad de productos en el carrito
    document.getElementById("subtotal").style.display="block";
    // Total Price tiene el valor total de la compra
    document.getElementById("total-amount").textContent=totalPrice;
    }
    }  
    </script>         
</body>
</html>