<?PHP

	if($clientes){?>

	<h2>Listado de Clientes</h2>
		<table class="table table-striped table-hover">
			<thead class="tableHeadClientes">
				<tr>
					<td class="td_center"> Nombre </td>
					<td class="td_center"> Primer Apellido </td>
					<td class="td_center"> Segundo Apellido </td>
					<td class="td_center"> Dirección </td>
					<td class="td_center"> Teléfono </td>
					<td class="td_center"> Observ. Tel1 </td>
				</tr>
			</thead><?PHP
		foreach ($clientes as $cliente): ?>
		
			<tbody >
			
				<tr  >
					<td valign="middle">
						<?PHP echo $cliente->cli_nombre; ?>
					</td>
					<td>
						<?PHP echo $cliente->cli_apellido1; ?>
					</td>
					<td>
						<?PHP echo $cliente->cli_apellido2; ?>
					</td>
					<td>
						<?PHP echo $cliente->cli_direccion; ?>
					</td>
					<td>
						<?PHP echo $cliente->cli_telefono1; ?>
					</td>
					<td>
						<?PHP echo $cliente->cli_obs_tel1; ?>
					</td>
					<td>

						<a href="<?PHP echo base_url()?>mascota_cliente/asigna_mascota_cli_pro/<?=$cliente->id_cliente?>/<?=$id_mascota?>" 
							alt="Editar" title="Editar"> 
							<span class="btn btn-success navbar-right" role="button">
								Asignar a mascota &nbsp;	
                             	<i class="mdi-action-assignment" border='0' ></i>
                             </span>
						</a>
						
					</td>
					
				</tr>
				
			</tbody>



		<?PHP endforeach;

			?>


		</table>



			<?PHP
	}else{
		echo "<p> No se ha encontrado ningún registro con la búsqueda</p>";



		?>

		

	<?PHP
	}



?>
