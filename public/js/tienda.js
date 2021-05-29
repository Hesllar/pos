const agregarCarritoBotones = document.querySelectorAll('.add-cart');
const contenedorProductos = document.querySelector('.lista-carrito');
const btnComprar = document.getElementById('realizar-compra');
var contador = 0;

// Create our number formatter.
var formatter = new Intl.NumberFormat('es-CL', {
    style: 'currency',
    currency: 'CLP',
  });

agregarCarritoBotones.forEach((productoAgregar) => {
    productoAgregar.addEventListener('click', agregarAlCarroClick);
});


    btnComprar.addEventListener('click', realizarCompra);


function agregarAlCarroClick(event) {
    const boton = event.target;
    const item = boton.closest('.single-product');

    const itemCodigo = item.querySelector('.id_produc').value;
    const itemNombre = item.querySelector('h4').textContent;
    const itemPrecio = item.querySelector('span').textContent;
    const itemImagen = item.querySelector('img').src;
    agregarProducto(itemCodigo, itemNombre, itemPrecio, itemImagen);
}

function actualizarContador(c, rev){
    const numeroContador = document.querySelector('.cart-counter');
    switch (c) {
        case "+":
            contador++;
            break;
        case "-":
            contador = contador - rev;
            break;
        default:
          contador = 0;
          break;
    }
    numeroContador.innerHTML=`${contador}`;
}

function agregarProducto(itemCodigo, itemNombre, itemPrecio, itemImagen) {
    actualizarContador("+",0);
    const tituloProd = contenedorProductos.getElementsByClassName('titulo');
    for(let i = 0; i < tituloProd.length; i++){
        if(tituloProd[i].textContent === itemNombre){
            cantidad = tituloProd[i].parentElement.parentElement.querySelector('.cantidad');
            cantidad.value++;
            actualizarTotal();
            return;
        }
    }
    
    const productoEnFila = document.createElement('li');
    const contenedor = `
    <div class="single-cart-box">
        <div class="cart-img">
            <input class="id_prod_carrito" id="id_prod_carrito" name="id_prod_carrito" value="${itemCodigo}" hidden>
            <a href="#"><img src=${itemImagen} alt="cart-image"></a>
        </div>
        <div class="cart-content">
            <h6><a class="titulo">${itemNombre}</a></h6>
            <span class="precio">$${itemPrecio}</span> x 
            <input id="cantidadComprar" name="cantidadComprar" class="cantidad" type="number" value="1"> 
        </div>
        <a class="del-icone"><i class="fa fa-window-close-o"></i></a>
    </div>`;
    productoEnFila.innerHTML = contenedor;
    contenedorProductos.append(productoEnFila);

    if(productoEnFila){
        productoEnFila
        .querySelector('.del-icone')
        .addEventListener('click', eliminarProducto);

        productoEnFila
        .querySelector('.cantidad')
        .addEventListener('change', cambiarCantidad);
    }
    
    actualizarTotal();
    ///cart-box

    
}

function actualizarTotal(){
    let total = 0;
    const totalCarrito = document.querySelector('.total');

    const itemsTotal = document.querySelectorAll('.single-cart-box');
    itemsTotal.forEach(itemTotal => {
        const itemPrecio = itemTotal.querySelector('.precio');
        const precioProducto = Number(itemPrecio.textContent.replace('$',''));

        const itemCantidad = itemTotal.querySelector('.cantidad').value;
        const cantidadProducto = Number(itemCantidad);
        total = total + precioProducto * cantidadProducto;
    });
    let ttt = formatter.format(total.toFixed(0));
    totalCarrito.innerHTML= `${ttt}`;
}

function eliminarProducto(event){
    const botonClick = event.target;
    const cantidadCarrito = botonClick.closest('.single-cart-box').querySelector(".cantidad");
    botonClick.closest('.single-cart-box').remove();
    actualizarTotal();
    actualizarContador("-",cantidadCarrito.value);
}

function cambiarCantidad(event){
    const entrada = event.target;
    entrada.value <= 0 ? (entrada.value = 1) : null;
    actualizarTotal();
}

function realizarCompra(){
    const carritoProductos = document.querySelectorAll('.single-cart-box');
    var arrayCompras = new Array();

    carritoProductos.forEach(carritoProducto => {
        var idProducto = carritoProducto.querySelector(".id_prod_carrito").value;
        var titulo =carritoProducto.querySelector(".titulo").textContent;
        var cantidad =carritoProducto.querySelector(".cantidad").value;
        var precio =carritoProducto.querySelector(".precio").textContent;
        arrayCompras.push([idProducto,titulo,cantidad,precio]);
    });
    
    var totalCarro = document.querySelector('.total').textContent;
                $.ajax({
   
                    method: "POST",
                    data: {
                        compras:arrayCompras,
                        total:totalCarro,
                    },
                    success: function(data){
                        return $("#main-producto").html(data);

                    },
                });
}
