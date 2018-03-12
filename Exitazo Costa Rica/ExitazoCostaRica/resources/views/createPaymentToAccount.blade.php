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
<div class="container">	
  <form class="form-horizontal">
      <div class="form-group">
          <label for="inputEmail" class="control-label col-xs-4">Fecha del abono</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" id="inputEmail" placeholder="Fecha del abono">
          </div>
      </div>
      <div class="form-group">
          <label for="inputEmail" class="control-label col-xs-4">Monto del abono</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" id="inputEmail" placeholder="Monto del abono">
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
    document.getElementById("navCustomers").style.color = "white";
    document.getElementById("buttonCustomers").style.background = "#ccc";
}
</script>
</html>