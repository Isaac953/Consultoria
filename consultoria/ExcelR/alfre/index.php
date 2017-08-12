<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>exportacion</title>
<link rel="stylesheet" type="text/css" href="datatables.min.css"/>
 
<script type="text/javascript" src="datatables2.min.js"></script>
	
	<div class="container" style="padding:20px;20px;">
      <div class="">
        <h1 align="center">EPORTACION</h1>
        <div class="">
		<table id="employee_grid" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
				<th>Contrasenia</th>
            </tr>
        </thead>
 
      
    </table>
    </div>
      </div>

    </div>

<script type="text/javascript">
$( document ).ready(function() {
$('#employee_grid').DataTable({
		 "processing": true,
         "sAjaxSource":"response.php",
		 "dom": 'lBfrtip',
		 "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'excel'
                ]
            }
        ]
        });
});
</script>
