<!DOCTYPE html>
<html lang="en">
    <head>

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Factura</title>
        <style>
            .clearfix:after {
              content: "";
              display: table;
              clear: both;
            }

            a {
              color: #5D6975;
              text-decoration: underline;
            }

            body {
              position: relative;
              margin: 0 auto;
              color: #001028;
              background: #FFFFFF;
              font-family: Arial, sans-serif;
              font-size: 12px !important;
              font-family: Arial;
            }

            header {
              padding: 10px 0;
              margin-bottom: 30px;
            }

            #logo {
              text-align: center;
              margin-bottom: 10px;
            }

            #logo img {
              width: 90px;
            }

            h1 {
              border-top: 1px solid  #5D6975 !important;
              border-bottom: 1px solid  #5D6975 !important;
              color: #5D6975 !important;
              font-size: 2.4em !important;
              line-height: 1.4em !important;
              font-weight: normal !important;
              text-align: center !important;
              background: url(dimension.png);
            }

            h2 {
                font-size: 1.2rem !important;
            }

            #project {
              float: left;
            }

            #project span {
              color: #5D6975;
              text-align: right;
              width: 52px;
              margin-right: 10px;
              display: inline-block;
              font-size: 0.8em;
            }

            #company {
              text-align: right;
            }

            #project div,
            #company div {
              white-space: nowrap;
            }

            table {
              width: 100%;
              border-collapse: collapse;
              border-spacing: 0;
              margin-bottom: 20px;
            }

            table tr:nth-child(2n-1) td {
              background: #F5F5F5;
            }

            table th,
            table td {
              text-align: center;
            }

            table th {
              padding: 5px 20px;
              color: #5D6975;
              border-bottom: 1px solid #C1CED9;
              white-space: nowrap;
              font-weight: normal;
            }

            table .service,
            table .desc {
              text-align: left;
            }

            table td {
              padding: 20px;
              text-align: right;
            }

            table td.service,
            table td.desc {
              vertical-align: top;
            }

            table td.unit,
            table td.qty,
            table td.total {
              font-size: 1.2em;
            }

            table td.grand {
              border-top: 1px solid #5D6975;;
            }

            .bg-gris {
                background: #F5F5F5;
            }

            #notices .notice {
              color: #5D6975;
              line-height: 1rem;
            }

            footer {
              color: #5D6975;
              width: 100%;
              position: absolute;
              bottom: 0;

              padding: 8px 0;
              text-align: center;
              margin-top: 1rem;
            }

            .company {

            }
          </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="../public/assets/image/logo.png">
      </div>
      <h1>Factura</h1>
        <div id="project">
            <h2>Direccion de entrega</h2>
            <p class="m-0">{{ $user->name }}</p>
            <p class="m-0">{{ $direccion->nombre_via }} nº {{ $direccion->numero }}</p>
            {{ $direccion->codigo_postal }} {{ $direccion->localidad }}
            <p class="m-0">{{ $direccion->provincia }}</p>
            <p class="m-0">{{ $direccion->pais }}</p>
            <p class="m-0">{{ $user->telefono }} </p>
        </div>
    </header>
    <main>
        <table>
            <thead>
              <tr class="bg-gris">
                <th class="service">Número de factura</th>
                <th class="desc">Fecha de factura</th>
                <th>Ref pedido</th>
                <th>Fecha de pedido</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="service">{{ $pedido->ref }}</td>
                <td class="desc">{{ $pedido->created_at }}</td>
                <td class="">{{ $pedido->ref }}</td>
                <td class="">{{ $pedido->created_at }}</td>
              </tr>
            </tbody>
        </table>

      <table>
        <thead>
          <tr>
            <th class="service">Código</th>
            <th class="desc">Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach($lineas as $linea)
            <tr>
                <td class="service">{{ $linea->producto->codigo }}</td>
                <td class="desc">{{ $linea->producto->nombre }}</td>
                <td class="unit">{{ $linea->producto->precio }}</td>
                <td class="qty">{{ $linea->cantidad }}</td>
                <td class="total">{{ $linea->subtotal }}</td>
            </tr>
          @endforeach
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">€{{ $pedido->total }}</td>
          </tr>
          <tr>
            <td colspan="4">IVA 21%</td>
            <td class="total">€{{ $iva }}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">€{{ $totalmasIva }}</td>
          </tr>
        </tbody>
      </table>
      </div>
      <div id="notices mb-3">
        <div>Advertencia:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.
    </div>
    </main>
    <footer>
        <div id="company" class="company">
            <div>Trazatech SL</div>
            <div>nif:  B93262616</div>
            <div>C/ Campo De la Iglesia n10 14</div>
            <div><a href="mailto:trazatech@mail.com">trazatech@mail.com</a></div>
        </div>
    </footer>

</body></html>
