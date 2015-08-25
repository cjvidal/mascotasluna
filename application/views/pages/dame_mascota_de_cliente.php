<?PHP

	if($reg_mascotas_clientes){?>

		<h3>Datos del Cliente</h3>
		<table class="table" >
			<thead class="tableHeadClientes">
				<tr>
					<td> Nombre </td>
					<td> Apellido1 </td>
					<td> Dirección </td>
					<td> Teléfono </td>
					<td class="td_center"> Observ. Tel1 </td>
				</tr>
			</thead><?PHP
		foreach ($reg_mascotas_clientes as $msc_cli): ?>
		
			<tbody class="">
			
				<tr >
					<td>
						<?PHP echo $msc_cli->cli_nombre; ?>
					</td>
					<td>
						<?PHP echo $msc_cli->cli_apellido1; ?>
					</td>
					<td>
						<?PHP echo $msc_cli->cli_direccion; ?>
					</td>
					<td>
						<?PHP echo $msc_cli->cli_telefono1; ?>
					</td>
					<td>
						<center><?PHP echo $msc_cli->cli_obs_tel1; ?></center>
					</td>
					<td>
						
							<a href="<?PHP echo base_url()?>clientes/dameClienteEditar/<?PHP echo $msc_cli->id_cliente?>" alt="Editar" title="Editar"> -->
							
								<span class="btn btn-success navbar-right" role="button">
									Ir a Ficha de Cliente &nbsp;	
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
		echo "<p> <h3>No hay clientes asociados a esta mascota </h3></p>";
	}



?>
