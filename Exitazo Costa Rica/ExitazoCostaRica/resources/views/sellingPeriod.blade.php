<!DOCTYPE html>
<html>
<head>
  <title></title>
  @include('partials.style')
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
@include('partials.nav')
<br>
@include('partials.inventoriesMenu')
<br>

<div class="container">
  <div class="row">
      <!-- Include Bootstrap Datepicker -->
    <div class="form-group" style="position: absolute;">
        <div class="col-xs-5 date">
            <div class="input-group input-append date" id="datePicker">
                <input type="text" class="form-control" name="date" />
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
    </div>
  </div>
      <!-- Include Bootstrap Datepicker -->
  <div class="form-group" style="margin-left: 55%;width: 100%">
      <div class="col-xs-5 date">
          <div class="input-group input-append date" id="datePicker2">
              <input type="text" class="form-control" name="date" />
              <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
      </div>
  </div>
</div>
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
         <th>Cantidad</th>
      </tr>
   </thead>   
   <tbody>
      <tr class="row-content">
         <td>NC00</td>
         <td>Zapatos ticos</td>
         <td>2000</td>
         <td>5000</td>
         <td>2500</td>
         <td>Zapatos</td>
         <td>12345</td>
      </tr>
      <tr class="row-content">
         <td>NC00</td>
         <td>Zapatos ticos</td>
         <td>2000</td>
         <td>5000</td>
         <td>2500</td>
         <td>Zapatos</td>
         <td>12345</td>
      </tr>
      <tr class="row-content">
         <td>NC00</td>
         <td>Zapatos ticos</td>
         <td>2000</td>
         <td>5000</td>
         <td>2500</td>
         <td>Zapatos</td>
         <td>12345</td>
      </tr>
      <tr class="row-content">
         <td>NC00</td>
         <td>Zapatos ticos</td>
         <td>2000</td>
         <td>5000</td>
         <td>2500</td>
         <td>Zapatos</td>
         <td>12345</td>
      </tr>
   </tbody>
  </table>
</div>

</body>
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            format: 'dd/mm/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });
    $('#datePicker2')
        .datepicker({
            format: 'dd/mm/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });
    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>
<script>
window.onload = function() {myFunction()};
function myFunction()
{
  document.getElementById("navBrand").style.color = "white";
  document.getElementById("navInventories").style.color = "white";
  document.getElementById("buttonPeriodicSellings").style.background = "#ccc";
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
    if (tdCode && tdDescription && tdDepartment) {
      if (tdCode.innerHTML.toUpperCase().indexOf(filter) > -1 || tdDescription.innerHTML.toUpperCase().indexOf(filter) > -1 || tdDepartment.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</html>