document.addEventListener('DOMContentLoaded', function () {
    const jsonFilePath = './js/productos.json';

    async function cargarProductos() {
        try {
          const response = await fetch(jsonFilePath);
          const data = await response.json();
          mostrarProductos(data.catalogo);
        } catch (error) {
          console.error('Error al cargar el archivo JSON:', error);
        }
    }
    function mostrarProductos(productos) {
        const detallesContainer = document.getElementById('productos');
    
        if (productos.length > 0) {
            const elementosHTML = productos.map(catalogo => `
            <div class="tarjeta">
                <img alt="imagen producto" src="./img/imagen2.png">
                <div class="tarjeta-descripcion">
                    <h4>${catalogo.nombre + "-" + catalogo.marca}</h4>
                    <div class="precios">
                        <div>
                            <p>Minorista:</p>
                            <code>${catalogo.precioMinorista}</code> 
                        </div>
                        <div>
                            <p>Mayorista:</p>
                            <code>${catalogo.precioMayorista}</code> 
                        </div>
                    </div>
                    <div>
                    <input type="button" value="añadir">
                    <input type="button" value="comprar ahora">
                    </div>
                </div>
            </div>
            `);
    
            detallesContainer.innerHTML = elementosHTML.join('');
        } else {
            detallesContainer.innerHTML = `
                <div class="error">
                    <img class="errorimg" src="/img/inty1.jpg" alt="ERROR 404">
                    <h1>No hay objetos disponibles</h1>
                    <a href="/index.html">Regresar a inicio</a>
                </div>
            `;
        }
    }
    cargarProductos();
    
});