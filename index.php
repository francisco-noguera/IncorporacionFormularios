<?php
//including the database connection file
include_once("db_connection.php");

// Bringing all the results on the database to list
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>
	<head>	
		<title>CRUD Francisco Noguera</title>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/functions.js"></script>
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="css/dataTables.bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	</head>

	<body>
		
		<div class="table-container">
			<div id="mainMessages"></div>
			<p class="add-button">
				<input class="btn btn-primary" type="button" value="Adicionar nuevo Usuario" data-toggle="modal" data-target="#myModal" onClick="clearForm();"/>
			</p>
			<table id="crud" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Telefono</td>
						<td>Correo Electronico</td>
						<td>Actualizar</td>
						<td>Borrar</td>
					</tr>
				</thead>
				<tbody>
					<?php 
					while($res = mysqli_fetch_array($result)) { 		
						echo "<tr>";
						echo "<td>".$res[1]."</td>";
						echo "<td>".$res[2]."</td>";
						echo "<td>".$res[3]."</td>";	
						echo "<td><a href=\"#\" onClick=\"loadEdit('$res[0]','$res[1]','$res[2]','$res[3]')\" data-toggle=\"modal\" data-target=\"#myModal\">Editar</a></td>";
						echo "<td><a href=\"delete.php?id=$res[0]\" onClick=\"return confirm('\u00BFEsta seguro que desea borrar el registro?')\">Borrar</a></td>";
					}
					?>
				</tbody>	
			</table>
		</div>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title">Guardar Usuario</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>
			  <div class="modal-body">
				<form id="storeForm" method="post" action="insert.php">
					<div id="modalMessages"></div>
					<div class="form-group">
						<input type="hidden" id="userId" name="userId"/>
						<label for="name">Nombre:</label>
						<input type="text" class="form-control" id="name" name="name"/>
					</div>
					<div class="form-group">
						<label for="phone">Tel&eacute;fono:</label>
						<input type="text" class="form-control" id="phone" name="phone"/>
					</div>
					<div class="form-group">
						<label for="email">Correo Electronico:</label>
						<input type="email" class="form-control" id="email" name="email"/>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button id="storeBtn" type="button" class="btn btn-primary">Guardar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>

		  </div>
		</div>
			
			<script>
			$(document).ready(function() {
				$('#crud').DataTable();
			} );			
			</script>
		
	</body>
</html>