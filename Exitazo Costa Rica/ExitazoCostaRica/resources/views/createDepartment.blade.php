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
          <label for="inputEmail" class="control-label col-xs-4">Nombre del departamento</label>
          <div class="col-xs-5">
              <input type="text" class="form-control" id="inputEmail" placeholder="Departamento">
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
  window.onload = function() {loadPage()};
  function loadPage()
  {
    document.getElementById("navBrand").style.color = "white";
    document.getElementById("navInventories").style.color = "white";
    document.getElementById("buttonDepartments").style.background = "#ccc";    
  }
</script>
</html>