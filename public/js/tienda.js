const agregarCarritoBotones = document.querySelectorAll('.add-cart');
const contenedorProductos = document.querySelector('.lista-carrito');

// Create our number formatter.
var formatter = new Intl.NumberFormat('es-CL', {
    style: 'currency',
    currency: 'CLP',
  
    // These options are needed to round to whole numbers if that's what you want.
    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
  });

agregarCarritoBotones.forEach((productoAgregar) => {
    productoAgregar.addEventListener('click', agregarAlCarroClick);
});

function agregarAlCarroClick(event) {
    const boton = event.target;
    const item = boton.closest('.single-product');

    const itemNombre = item.querySelector('h4').textContent;
    const itemPrecio = item.querySelector('span').textContent;
    const itemImagen = item.querySelector('img').src;

    agregarProducto(itemNombre, itemPrecio, itemImagen);

}

function agregarProducto(itemNombre, itemPrecio, itemImagen) {
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
            <a href="#"><img src=${itemImagen} alt="cart-image"></a>
        </div>
        <div class="cart-content">
            <h6><a class="titulo">${itemNombre}</a></h6>
            <span class="precio">$${itemPrecio}</span> x 
            <input class="cantidad" type="number" value="1"> 
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
    botonClick.closest('.single-cart-box').remove();
    actualizarTotal();
}

function cambiarCantidad(event){
    const entrada = event.target;
    entrada.value <= 0 ? (entrada.value = 1) : null;
    actualizarTotal();
}

const cfoot = `
<div class="cart-footer fix">
<h5>total :<span class="f-right">$698.00</span></h5>
<div class="cart-actions">
    <a class="checkout" href="checkout.html">Comprar</a>
</div>
</div>`;
