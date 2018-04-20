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
              <input name="filterSearchInput" id="filterSearchInput" type="text" class="  search-query form-control" placeholder="Código del producto" />
              <span class="input-group-btn">
                  <button class="btn bg-dark" type="submit" onclick="agregarAListaFactura()">
                      <span class=" glyphicon glyphicon-search"></span>
                  </button>
              </span>            
          </div>
      </div>
  </div>
</div>
<br>
<a id="test"></a>
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
       <tbody id="tableBody">        
          
       </tbody>
    </table>
</div>
<br>
<div class="container">
  <div class="row">
    <h2 style="">Productos en la venta actual:&nbsp <span>0</span></h2>
    <h2 style="float: right; margin-right: 5%" id="total">₡:&nbsp <span>0</span></h2>
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
  <a href="/ventasDevoluciones" rel="nofollow" class="btn btn-default cboxElement" style="float: right; margin-right: 1.5%">Ventas del dia y devoluciones</a>
  </div>
</div>
</body>
<script>
var listaFactura= [];
var billNumber = 0;


function agregarFilaTabla(){  
  var total= 0;
  document.getElementById("tableBody").innerHTML= "";
  for (var i = 0; i< listaFactura.length; i++) {    
    var tr = document.createElement('tr');
    tr.className= "row-content";
    
    var td_codigoProducto = document.createElement('td');
    td_codigoProducto.innerHTML = listaFactura[i][0][0].codigoProducto;

    var td_descripcion = document.createElement('td');
    td_descripcion.innerHTML = listaFactura[i][0][0].descripcion;

    var td_precioVenta = document.createElement('td');
    td_precioVenta.innerHTML = listaFactura[i][0][0].precioVenta;
    
    var td_cantidad = document.createElement('td');
    td_cantidad.innerHTML = listaFactura[i][1];

    var td_importe = document.createElement('td');
    td_importe.innerHTML = listaFactura[i][2];
    total= total+listaFactura[i][2];

    var td_cantidadDePExist = document.createElement('td');
    td_cantidadDePExist.innerHTML = listaFactura[i][0][0].cantidadDeProduct;

    var td_botonEliminar = document.createElement('td');
    td_botonEliminar.innerHTML = "<a class='btn btn-danger edit' href='path/to/settings' aria-label='Settings'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>";

    tr.appendChild(td_codigoProducto);
    tr.appendChild(td_descripcion);
    tr.appendChild(td_precioVenta);
    tr.appendChild(td_cantidad);
    tr.appendChild(td_importe);
    tr.appendChild(td_cantidadDePExist);
    tr.appendChild(td_botonEliminar);

    document.getElementById("tableBody").appendChild(tr);  
  }
  document.getElementById("total").innerHTML= "";  
  document.getElementById("total").innerHTML= "₡:"+ total;  
}

function agregarAListaFactura(){
  var elemento=document.getElementById('filterSearchInput').value;  
  $.ajax({
    url:"/facturas/insrtListProv/"+elemento,
    type:"GET",
    dataType: 'text',
    success: function(data){        
        cantidad= 1;
        var json = JSON.parse(data);        
        var importe= json[0].precioVenta * cantidad;    
        listaFactura.push([json,cantidad,importe]);
        agregarFilaTabla();
    },
    error: function(error){
         console.log("Error:");
         console.log(error);
    }
  });
}



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

document.addEventListener("keydown", keyDownTextField, false);
function keyDownTextField(e) {
var keyCode = e.keyCode;
  //F10
  if(keyCode==121) {
  alert("You hit the F10.");
  } 
  //F12
  else if(keyCode==123) {
    alert("You hit the F12.");
  }
  //F11
  else if(keyCode==122) {
    alert("You hit the F11.");
  }
  //F8
  else if(keyCode==119) {
    window.location.href = "/salidas";
  }
  //F7
  else if(keyCode==118) {
    window.location.href = "/entradas";
  }
}
</script>
</html>