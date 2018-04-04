<!DOCTYPE html>
<html>
<head>
  <title></title>
  @include('partials.style')
</head>
<body>
@include('partials.nav')
<br>
@include('partials.inventoriesMenu')
<br>
<a href="/crearProducto" style="margin-left: 20%" class="btn btn-info cboxElement">Agregar Producto</a>
<a type="button" value="Add" onclick="findLowInInventoryCoincidencesInRows()" style="margin-left: 20%" class="btn btn-default cboxElement">Productos bajos en inventario</a>
<br>
<br>
@include('partials.filterSearchBar')
<br>
<div class="container">  
  <table id="contentTable" class="table table-striped">
   <thead>      
      <tr class="row-name">
         <th>Código de barras</th>
         <th>Descripción</th>
         <th>Precio costo</th>
         <th>Precio venta</th>
         <th>Precio mayoreo</th>
         <th>Departamento</th>
         <th>Cantidad actual</th>
         <th>Mínimo</th>
      </tr>
   </thead>   
   <tbody>
      @foreach($productos as $productos)
        <tr class="row-content">
         <td>{{$productos->codigoProducto}}</td>
         <td>{{$productos->descripcion}}</td>
         <td>{{$productos->precioCosto}}</td>
         <td>{{$productos->precioVenta}}</td>
         <td>{{$productos->precioMayoreo}}</td>
         <td>{{$productos->nombreDepartamento}}</td>
         <td>{{$productos->cantidadDeProduct}}</td>
         <td>{{$productos->cantMinimaProd}}</td>
         <td>
            <a title="Eliminar" class="btn btn-danger" href="/eliminar/producto/{{$productos->codigoProducto}}" aria-label="Settings">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </a>
            &nbsp 
            <a title="Modificar" class="btn btn-warning" aria-label="Settings">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a> 
          </td>
        </tr>        
      @endforeach      
   </tbody>
  </table>
</div>
</body>
<script>
  window.onload = function() {loadPage()};
  /*function getUrl() {
    var URLactual = window.location;
    return URLactual;
  }*/
  function checkIfInventoryOrProductLowInInventory() {
    document.getElementById("buttonProducts").style.background = "#ccc"; 
    /*if (getUrl() == "http://localhost:8000/productoBajoEnInventario") {
      document.getElementById("buttonProductLowInInventory").style.background = "#ccc"; 
      findLowInInventoryCoincidencesInRows();
    }
    else {
      document.getElementById("buttonProducts").style.background = "#ccc"; 
    }*/
  }
  function loadPage() {
    document.getElementById("navBrand").style.color = "white";
    document.getElementById("navInventories").style.color = "white";
    checkIfInventoryOrProductLowInInventory(); 
    document.getElementById("filterSearchInput").placeholder = "Código de barras / Descripción / Departamento";
  }
  function findCoincidencesInRows() {
    var input, filter, table, tr, tdCode, tdDescription, tdDepartment, i;
    input = document.getElementById("filterSearchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("contentTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      tdCode = tr[i].getElementsByTagName("td")[0];
      tdDescription = tr[i].getElementsByTagName("td")[1];
      tdDepartment = tr[i].getElementsByTagName("td")[5];
      if (tdCode && tdDescription) {
        if (tdCode.innerHTML.toUpperCase().indexOf(filter) > -1 || tdDescription.innerHTML.toUpperCase().indexOf(filter) > -1 || tdDepartment.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
  function findLowInInventoryCoincidencesInRows() {
    var filter, table, tr, tdCode, tdDescription, tdDepartment, i;
    filter = 0;
    table = document.getElementById("contentTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      tdQuantity = tr[i].getElementsByTagName("td")[6];
      if (tdQuantity) {
        if (tdQuantity.innerHTML == filter) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
</script>
</html>