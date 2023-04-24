<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>BD JENNY CASTILLO</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">	</head>
	<body>
		<div class="container">
			<!-- Título de oa página -->
			<div class="row">
				<h2>REGISTRO</h2>
			</div>

			<!-- Formulario -->
			<div class="mb-5">
				<?php echo form_open('welcome/agregar', ['id' => 'form-persona']); ?>
					<div class="row">
							<div class="form-group col-sm-4">
						<label for="">CI</label>
						<input type="text" name="ci" class="form-control" required autocomplete="off" id="ci">
					</div>
					<div class="form-group col-sm-4">
						<label for="">Nombre Completo</label>
						<input type="text" name="nombre" class="form-control" required autocomplete="off" id="nombre">
					</div>
					<div class="form-group col-sm-4">
						<label for="">Fecha de Nacimiento</label>
						<input type="text" name="fecha" class="form-control" required placeholder="AA/MM/DD" autocomplete="off" id="fecha">
					</div>
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="">Telefono</label>
							<input type="tex" id="telefono" name="telefono" class="form-control" value="(591)" autocomplete="off" required autocomplete="off" id="telefono">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Codigo de Departamento</label>
							<input type="text" name="codigo" class="form-control" required placeholder="Ej: La Paz -> 02" autocomplete="off" id="codigo">
							<br>
						</div>
					</div>
					
				</div>
				<button type="submit" class="btn btn-primary btn-block">Registrar</button>
				<?php echo form_close(); ?>
			</div>

			<!-- Tabla de datos -->
			<div class="row">
				<div class="card col-12">
					<div class="card-header">
						<h4>Tabla de personas</h4>
					</div>
					<div class="card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">CI</th>
									<th scope="col">Nombre Completo</th>
									<th scope="col">Fecha de Nacimiento</th>
									<th scope="col">Telefono</th>
									<th scope="col">Codigo_Deptos</th>
									<th scope="col">Editar</th>
									<th scope="col">Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$count = 0;
									foreach ($persona as $persona) {
									echo '
											<tr>
												<td>'.++$count.'</td>
														<td>'.$persona->ci.'</td>
				<td>'.$persona->NombreCompleto.'</td>
				<td>'.$persona->FechaNacimiento.'</td>
				<td>'.$persona->Telefono.'</td>
				<td>'.$persona->codigo_deptos.'</td>
				<td><button type="button" class="btn btn-warning text-white" onclick="llenar_datos('.$persona->ci.', `'.$persona->NombreCompleto.'`, `'.$persona->FechaNacimiento.'`, `'.$persona->Telefono.'`, `'.$persona->codigo_deptos.'`)">Editar</button></td>
				<td><a href="'.base_url('welcome/eliminar/'.$persona->ci).'" type="button" class="btn btn-danger">Eliminar</a></td>
			</tr>
		';
	}
?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script>
			let url = "<?php echo base_url('welcome/editar'); ?>";
			const llenar_datos = (ci, NombreCompleto, FechaNacimiento, Telefono, codigo_deptos) => {
				let path = url+"/"+ci;
				document.getElementById('form-persona').setAttribute('action', path);
				document.getElementById('ci').value = ci;
				document.getElementById('nombre').value = NombreCompleto;
				document.getElementById('fecha').value = FechaNacimiento;
				document.getElementById('telefono').value = Telefono;
				document.getElementById('codigo').value =codigo_deptos ;
			};
		
		</script>
	</body>
</html>