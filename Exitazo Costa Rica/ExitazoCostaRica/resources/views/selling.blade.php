<!DOCTYPE html>
<html>
<head>
  <title></title>
  @include('partials.style')
</head>
<body>
@include('partials.nav')
<br>
@include('partials.sellingsMenu')
<br>
<div class="container">
  <div class="row">
     <div id="custom-search-input">
          <div class="input-group col-md-12">
              <input onkeyup="myFunction()" id="filterSearchInput" type="text" class="  search-query form-control" placeholder="Código del producto" />
              <span class="input-group-btn">
                  <button class="btn bg-dark" type="button">
                      <span class=" glyphicon glyphicon-search"></span>
                  </button>
              </span>
          </div>
      </div>
  </div>
</div>
<br>
<a id="test">PRUEBA REDIRECCION</a>
<br>
<span style="margin-left: 165px" id="billBar"></span>
<br>
<br>
<div class="container">
    <table id="contentTable" class="table table-striped">
       <thead>
          <tr class="row-name"> 
             <th>Código de barras</th>
             <th>Descripción del producto</th>
             <th>Precio venta</th>
             <th>Cantidad</th>
             <th>Importe</th>
             <th>Existencia</th>
          </tr>
       </thead>   
       <tbody>
          <tr class="row-content">
             <td>C00</td>
             <td>monederos</td>
             <td>5250</td>
             <td>2<i class="fa fa-thumbs-up" aria-hidden="true"></i></td>
             <td>10500</td>
             <td>12</td>
             <td>
                <a class="btn btn-danger edit" href="path/to/settings" aria-label="Settings">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
             </td>
          </tr>
          <tr class="row-content">
             <td>FA101</td>
             <td>bolsos</td>
             <td>5250</td>
             <td>2<i class="fa fa-thumbs-up" aria-hidden="true"></i></td>
             <td>10500</td>
             <td>0</td>
             <td>
                <a class="btn btn-danger edit" href="path/to/settings" aria-label="Settings">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
             </td>
          </tr>
          <tr class="row-content">
             <td>H202</td>
             <td>fajas</td>
             <td>5250</td>
             <td>2<i class="fa fa-thumbs-up" aria-hidden="true"></i></td>
             <td>10500</td>
             <td>12</td>
             <td>
                <a class="btn btn-danger edit" href="path/to/settings" aria-label="Settings">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
             </td>
          </tr>
          <tr class="row-content">
             <td>FA0020</td>
             <td>Zapatos</td>
             <td>5250</td>
             <td>2<i class="fa fa-thumbs-up" aria-hidden="true"></i></td>
             <td>10500</td>
             <td>12</td>
             <td>
                <a class="btn btn-danger edit" href="path/to/settings" aria-label="Settings">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
             </td>
          </tr>
       </tbody>
    </table>
</div>
<br>
<div class="container">
  <div class="row">
    <h2 style="">Productos en la venta actual:&nbsp <span>0</span></h2>
    <h2 style="float: right; margin-right: 5%">₡:&nbsp <span>0</span></h2>
    <a href="#" rel="nofollow" class="btn btn-default cboxElement" style="float: right; margin-right: 5%">F12 Cobrar</a>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="btn-group" role="group" aria-label="...">
      <a href="#" class="btn btn-default cboxElement"  type="button" value="Add" onclick="addBill()">Pendiente</a>
      <a href="#" class="btn btn-default cboxElement"  type="button" value="Delete" onclick="deleteBill()">Eliminar</a>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <h3 style="position: absolute;">Total:&nbsp <span>0</span></h3><h3 style="position: absolute; margin-left: 15%">Pagó con:&nbsp <span>crédito</span></h3><h3 style="position: absolute; margin-left: 35%">Cambio:&nbsp <span>0</span></h3>
    <a href="#" rel="nofollow" class="btn btn-default cboxElement" style="float: right; margin-right: 5%">Reimprimir último tiquete</a> 
  <a href="#" rel="nofollow" class="btn btn-default cboxElement" style="float: right; margin-right: 1.5%">Ventas del dia y devoluciones</a>
  </div>
</div>
</body>
<script>
var billNumber = 0;
window.onload = function() {loadSite()};
function loadSite() {
  var t = document.getElementById("test");
  t.href = "/inventario";
  addBill();
  findBill().style.background = "#ccc";
  document.getElementById("navBrand").style.color = "white";
  document.getElementById("navSellings").style.color = "white";
  document.getElementById("buttonBill").style.background = "#ccc";
  document.getElementById("buttonDetail").style.background = "#ccc";
}
function getBillQuantity() {
    var bill = document.getElementById("billBar");
    var billQuantity = bill.childElementCount;
    console.log(billQuantity);
    return billQuantity;
}
function addBill() {
    billNumber += 1;
    var element = document.createElement("input");
    element.setAttribute("type", "button");
    element.setAttribute("value", "factura "+billNumber);
    element.setAttribute("id", billNumber);
    var bill = document.getElementById("billBar");
    bill.appendChild(element);
}
function findBill() {
  var item = document.getElementById(billNumber);
  return item;
}
function deleteBill() {
  var item = findBill();
  item.parentNode.removeChild(item);
}





function myFunction() {
  // Declare variables 
  console.log("asf");
  var input, filter, table, tr, td, i;
  input = document.getElementById("filterSearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("contentTable");
  tr = table.getElementsByTagName("tr");
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}




</script>
</html>