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
  <form class="form-horizontal">
      <div class="form-group">
          <label for="inputEmail" class="control-label col-xs-4">Nombre de la promoción</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" id="inputEmail" placeholder="Nombre de la promoción">
          </div>
      </div>
      <div class="form-group">
          <label for="inputEmail" class="control-label col-xs-4">Código de barras</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" id="inputEmail" placeholder="Código de barras">
          </div>
      </div>
      <div class="form-group">
          <label for="inputEmail" class="control-label col-xs-4">Cantidad inicial</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" id="inputEmail" placeholder="Cantidad inicial">
          </div>
      </div>
      <div class="form-group">
          <label for="inputEmail" class="control-label col-xs-4">Cantidad final</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" id="inputEmail" placeholder="Cantidad final">
          </div>
      </div>
      <div class="form-group">
          <label for="inputEmail" class="control-label col-xs-4">Precio unitario</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" id="inputEmail" placeholder="Precio unitario">
          </div>
      </div>
      <div class="form-group">
          <div class="col-xs-offset-6 col-xs-10">
              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-save"></span>&nbspGuardar</button>
          </div>
      </div>
  </form>
</div>

</body>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
window.onload = function() {myFunction()};
function myFunction()
{
  document.getElementById("navBrand").style.color = "white";
  document.getElementById("navInventories").style.color = "white";
  document.getElementById("buttonPromotions").style.background = "#ccc";
}
</script>
</html>