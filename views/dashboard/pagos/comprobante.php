<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante</title>
</head>
<style>
    body {
        font-size: 17px;
    }

    p {
        margin: 0;
        margin-top: .5rem;
    }

    .titulo {
        font-size: 30px;
    }

    .contenedor {
        border: 1px solid;
        border-radius: 30px;
        max-width: 1000px;
        padding: 1.5rem;
    }

    .encabezado {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .fecha {
        text-align: end;
    }

    .concepto {
        display: flex;
    }

    .pie {
        display: flex;
        justify-content: space-around;
        margin-top: 1rem;
    }

    .firmas {
        display: flex;
        justify-content: space-between;
        margin-top: 3rem;
        align-items: flex-end;
    }

    .firmaEmpresa {
        text-align: center;

    }

    .firmaEmpresa p {
        margin-top: 0;
    }

    .firmaCliente {
        text-align: center;
    }

    .firmaCliente p {
        margin-top: 0;
    }
</style>

<body>
    <div class="contenedor">
        <div class="encabezado">
            <img src="logo-modified.png" alt="" width="90px">
            <p class="titulo">RECIBO DE PAGO</p>
            <p>N.° 5</p>
        </div>
        <div class="fecha">
            <p>Cancun, Quintana Roo a 20 del mes de Octubre del año 2022</p>
        </div>

        <div class="persona">
            <p>Recibí de: <span>JOSE GUADALUPE JIMENEZ MARTINEZ.</span></p>
        </div>
        <div class="monto">
            <p>La cantidad de: <span>$3,708.33 M/N</span></p>
        </div>
        <div class="monto_letras">
            <p>Cantidad en Letras: <span>TRES MIL SETECIENTOS OCHO PESOS 33/100 M.N.</span></p>
        </div>
        <div class="concepto">
            <p>En concepto de pago de: <span>Pago de mensualidad (Mensualidad 5 de 120)</span> </p>
        </div>

        <div class="pie">
            <p>LOTE: 14</p>
            <p>MANZANA: N/A</p>
            <p>ETAPA: 1</p>
        </div>
        <div class="firmas">
            <div class="firmaEmpresa">
                <img src="firma_etapa_1.png" width="90px" alt="">
                <p>Recibí.</p>
                <p>C. SERAFINA CANUL KUMUL.</p>
            </div>
            <div class="firmaCliente">
                <p>Recibí.</p>
                <p>NOMBRE DEL CLIENTE.</p>
            </div>
        </div>
    </div>
</body>

</html>