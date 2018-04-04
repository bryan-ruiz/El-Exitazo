<!DOCTYPE html>
<html>
<head>
  <title></title>
  @include('partials.style')
</head>
<body>
@include('partials.nav')
<br>
@include('partials.customersMenu')
<br>
<br>
<div class="container">
    <div class="row form-horizontal">
        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Nombre completo</label>
            <div class="col-xs-5">
                <input type="text" class="form-control" id="inputEmail" placeholder="Nombre completo" disabled value="{{$user->nombrePersona}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="control-label col-xs-2">Dirección</label>
            <div class="col-xs-5">
                <input type="text" class="form-control" id="inputPassword" placeholder="Dirección" value="{{$user->nombrePersona}}" disabled>
            </div>
        </div>
            <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Teléfono</label>
            <div class="col-xs-5">
                <input type="email" class="form-control" id="inputEmail" placeholder="Teléfono" value="{{$user->nombrePersona}}" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="control-label col-xs-2">Límite de credito</label>
            <div class="col-xs-5">
                <input type="password" class="form-control" id="inputPassword" placeholder="Límite de credito" value="{{$user->nombrePersona}}" disabled>
            </div>
        </div>
        <div class="form-group">
                <label for="inputPassword" class="control-label col-xs-2">Saldo actual</label>
                <div class="col-xs-5">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Saldo actual" value="{{$user->nombrePersona}}" disabled>
                </div>
            </div>
    </div>
</div>
<br>
<a href="/crearAbono" style="margin-left: 20%" class="btn btn-info cboxElement">Agregar abono</a>
<br>
<br>
<div class="container">
  <table id="contentTable" class="table table-striped">
   <thead>
      <tr class="row-name">
         <th>Número de factura</th>
         <th>Fecha del abono</th>
         <th>Monto del abono</th>
      </tr>
   </thead>   
   <tbody>
      <tr class="row-content">
         <td>1</td>
         <td>12/01/2018</td>
         <td>90550</td>
      </tr>
      <tr class="row-content">
         <td> 1</td>
         <td>12/01/2018</td>
         <td>1000</td>
      </tr>
      <tr class="row-content">
         <td> 1</td>
         <td>12/01/2018</td>
         <td>12500</td>
      </tr>
      <tr class="row-content">
         <td> 1</td>
         <td>12/01/2018</td>
         <td>55000</td>
      </tr>
   </tbody>
  </table>
</div>
</body>
<script>
window.onload = function() {loadSite()};
function loadSite()
{
  document.getElementById("navBrand").style.color = "white";
  document.getElementById("navCustomers").style.color = "white";
  document.getElementById("buttonCustomers").style.background = "#ccc";
  document.getElementById("filterSearchInput").placeholder = "Nombre del cliente";
}
function findCoincidencesInRows() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("filterSearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("contentTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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