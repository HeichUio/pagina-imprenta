<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cotizar - SoulPrint</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #0f0f0f;
    color: white;
}

/* NAV */
.nav {
    display: flex;
    justify-content: space-between;
    padding: 20px 50px;
    background: #111;
}

.nav a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
    position: relative;
}

.nav a::after {
    content: "";
    position: absolute;
    width: 0%;
    height: 2px;
    bottom: -5px;
    left: 0;
    background: #4b7bff;
    transition: 0.3s;
}

.nav a:hover::after {
    width: 100%;
}

/* CONTENEDOR */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px;
}

/* CARD */
.card {
    width: 100%;
    max-width: 500px;
    padding: 30px;
    border-radius: 15px;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(15px);
    box-shadow: 0 0 30px rgba(75,123,255,0.3);
}

/* INPUTS */
.input-group {
    margin-top: 15px;
}

label {
    font-size: 14px;
    color: #aaa;
}

input, textarea {
    width: 100%;
    padding: 12px;
    margin-top: 5px;
    border-radius: 8px;
    border: none;
    background: rgba(255,255,255,0.08);
    color: white;
}

input:focus, textarea:focus {
    outline: none;
    box-shadow: 0 0 10px #4b7bff;
}

/* BOTÓN */
button {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    border: none;
    margin-top: 20px;
    background: linear-gradient(45deg, #2f49ff, #4b5cff);
    color: white;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    box-shadow: 0 0 15px #4b7bff;
}

/* TOTAL */
.total {
    margin-top: 20px;
    font-size: 20px;
    text-align: center;
    color: #4b7bff;
}

</style>
</head>

<body>

<!-- NAV -->
<div class="nav">
    <div><b>SoulPrint</b></div>
    <div>
        <a href="{{ route('home') }}">Inicio</a>
        <a href="{{ route('servicios') }}">Servicios</a>
        <a href="{{ route('contacto') }}">Contacto</a>
    </div>
</div>

<!-- FORM -->
<div class="container">
    <div class="card">

        <h2>Cotizar producto</h2>

        <!-- INFO DEL PRODUCTO -->
        <div style="margin-bottom: 20px; text-align:center;">
            <h3 style="margin: 0;">{{ $producto->nombre_p }}</h3>
            <p style="color:#4b7bff; font-size:18px; margin-top:5px;">
                Precio: ${{ $producto->precio_venta }} MXN
            </p>
        </div>

        <form id="formCotizacion">
            @csrf

            <!-- ID PRODUCTO -->
            <input type="hidden" id="id_producto" value="{{ $producto->id_producto }}">

            <!-- NOMBRE -->
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" id="nombre" required>
            </div>

            <!-- TELEFONO -->
            <div class="input-group">
                <label>Teléfono</label>
                <input type="text" id="telefono" required>
            </div>

            <!-- CANTIDAD -->
            <div class="input-group">
                <label>Cantidad</label>
                <input type="number" id="cantidad" min="1" required>
            </div>

            <!-- LONA (solo si aplica) -->
            <div class="input-group" id="lonaCampos" style="display:none;">
                <label>Ancho (metros)</label>
                <input type="number" id="ancho" step="0.1">

                <label>Alto (metros)</label>
                <input type="number" id="alto" step="0.1">
            </div>

            <!-- DESCRIPCIÓN -->
            <div class="input-group">
                <label>Descripción del diseño</label>
                <textarea id="descripcion" required></textarea>
            </div>

            <!-- TOTAL -->
            <div class="total" id="total">
                Total: $0
            </div>

            <button type="submit">Enviar cotización</button>

        </form>

    </div>
</div>

<script>
let precio = {{ $producto->precio_venta }};
let nombreProducto = "{{ $producto->nombre_p }}";

const cantidadInput = document.getElementById("cantidad");
const totalDiv = document.getElementById("total");

const anchoInput = document.getElementById("ancho");
const altoInput = document.getElementById("alto");
const lonaCampos = document.getElementById("lonaCampos");

// Detectar si es lona
let esLona = nombreProducto.toLowerCase().includes("lona");

if(esLona){
    lonaCampos.style.display = "block";
}

function calcularTotal(){
    let cantidad = parseFloat(cantidadInput.value) || 0;

    if(esLona){
        let ancho = parseFloat(anchoInput.value) || 0;
        let alto = parseFloat(altoInput.value) || 0;

        let area = ancho * alto;
        let total = area * 100 * cantidad;

        totalDiv.innerText = "Total: $" + total.toFixed(2);
    } else {
        let total = precio * cantidad;
        totalDiv.innerText = "Total: $" + total.toFixed(2);
    }
}

cantidadInput.addEventListener("input", calcularTotal);
if(anchoInput) anchoInput.addEventListener("input", calcularTotal);
if(altoInput) altoInput.addEventListener("input", calcularTotal);

// SUBMIT
document.getElementById("formCotizacion").addEventListener("submit", async function(e){
    e.preventDefault();

    let id_producto = document.getElementById("id_producto").value;
    let descripcion = document.getElementById("descripcion").value;
    let nombre = document.getElementById("nombre").value;
    let telefono = document.getElementById("telefono").value;
    let cantidad = document.getElementById("cantidad").value;

    let ancho = anchoInput ? anchoInput.value : null;
    let alto = altoInput ? altoInput.value : null;

    let totalTexto = document.getElementById("total").innerText;
    let total = totalTexto.replace("Total: $", "");

    // GUARDAR EN BD
    try {

    const res = await fetch("{{ route('cotizacion.web.store') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            id_producto,
            descripcion,
            cantidad
        })
    });

    const data = await res.json();

    console.log("RESPUESTA BD:", data);

    } catch (error) {
        console.error("ERROR FETCH:", error);
    }

    // MENSAJE WHATSAPP
    let mensaje = `🧾 *Nueva cotización - SoulPrint*

📦 *Producto:* ${nombreProducto}
🔢 *Cantidad:* ${cantidad}
💰 *Total:* $${total}

`;

    if(esLona){
        mensaje += `📐 *Medidas:*
Ancho: ${ancho} m
Alto: ${alto} m

`;
    }

    mensaje += `🖌️ *Descripción del diseño:*
${descripcion}

👤 *Cliente:*
Nombre: ${nombre}
Teléfono: ${telefono}
`;

    let numero = "527291292501"; // 👈 IMPORTANTE: formato internacional

    let url = `https://wa.me/${numero}?text=${encodeURIComponent(mensaje)}`;

    window.open(url, "_blank");
});
</script>

</body>
</html>