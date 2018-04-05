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
<div class="container">
  <form class="form-horizontal" method="post" action="/crear/producto" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
      <div class="form-group">
          <label for="inputCodigoBarras" class="control-label col-xs-2">Código de barras</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" name="inputCodigoBarras" id="inputCodigoBarras" placeholder="Nombre completo">
          </div>
      </div>
      <div class="form-group">
          <label for="inputDesc" class="control-label col-xs-2">Descripción</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" name="inputDesc" id="inputDesc" placeholder="Descripción">
          </div>
      </div>
        <div class="form-group">
          <label for="inputPrecioCosto" class="control-label col-xs-2">Precio de costo</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" name="inputPrecioCosto" id="inputPrecioCosto" placeholder="Precio de costo">
          </div>
      </div>
      <div class="form-group">
          <label for="inputPrecioVenta" class="control-label col-xs-2">Precio de venta</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" name="inputPrecioVenta" id="inputPrecioVenta" placeholder="Precio de venta">
          </div>
      </div>
      <div class="form-group">
          <label for="inputPrecioMayoreo" class="control-label col-xs-2">Precio de mayoreo</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" name="inputPrecioMayoreo" id="inputPrecioMayoreo" placeholder="Precio de mayoreo">
          </div>
      </div>
      <div class="form-group">
          <label for="inputDep" class="control-label col-xs-2">Departamento</label>
          <select style="width: 39%;margin-left: 18%" class="input form-control pdi-spacing-02" id="inputDep" name="inputDep">
              <option>Seleccione el departamento...</option>
              <option>Zapatos</option>
              <option>Bolsos</option>
              <option>Cuero</option>
              <option>Fajas</option>
          </select>
      </div>
      <div class="form-group">
          <label for="inputCantidad" class="control-label col-xs-2">Cantidad actual</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" name="inputCantidad" id="inputCantidad" placeholder="Cantidad actual">
          </div>
      </div>
      <div class="form-group">
          <label for="inputMinimo" class="control-label col-xs-2">Minimo</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" name="inputMinimo" id="inputMinimo" placeholder="Minimo">
          </div>
      </div>
      <div class="form-group">
          <div class="col-xs-offset-2 col-xs-10">
              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp Guardar</button>
          </div>
      </div>
  </form>
</div>
</body>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
  window.onload = function() {loadPage()};
  function loadPage()
  {
    document.getElementById("navBrand").style.color = "white";
    document.getElementById("navInventories").style.color = "white";
    document.getElementById("buttonProducts").style.background = "#ccc";    
  }
</script>
</html>