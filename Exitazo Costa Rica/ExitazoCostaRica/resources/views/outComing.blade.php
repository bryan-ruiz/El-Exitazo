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
<a href="/crearPromocion" style="margin-left: 20%" class="btn btn-info cboxElement">Agregar promoción</a>
<br>
<br>
<div class="container">
  <table class="table table-striped">
   <thead>
      <tr class="row-name">
         <th>Motivo</th>
         <th>Cantidad</th>
      </tr>
   </thead>   
   <tbody>
      <tr class="row-content">
         <td>Zapatos navideños</td>
         <td>23450</td>
      </tr>
      <tr class="row-content">
         <td>Zapatos navideños</td>
         <td>23450</td>
      </tr>
      <tr class="row-content">
         <td>Zapatos navideños</td>
         <td>23450</td>
      </tr>
      <tr class="row-content">
         <td>Zapatos navideños</td>
         <td>22000</td>
      </tr>
   </tbody>
  </table>
</div>
</body>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
window.onload = function() {myFunction()};
function myFunction()
{
  document.getElementById("navBrand").style.color = "white";
  document.getElementById("navSellings").style.color = "white";
  document.getElementById("buttonOutComing").style.background = "#ccc";
}
</script>
</html>