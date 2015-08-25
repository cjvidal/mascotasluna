<?PHP

	if($bc_cli_msc){?>

	<h2>Listado de Clientes / Mascotas</h2>
		<table class="table table-striped table-hover">
			<thead class="tableHeadClientes">
				<tr>
					<td class="td_center"> Nombre </td>
					<td class="td_center"> Primer Apellido </td>
					<td class="td_center"> Segundo Apellido </td>
					<td class="td_center"> Teléfono </td>
					<td class="td_center tableHeadMascotas"> Mascota </td>
					<td class="td_center tableHeadMascotas"> Raza </td>
					<td class="td_center tableHeadMascotas"> Sexo </td>
					<td class="td_center tableHeadMascotas"> Medida </td>

				</tr>
			</thead><?PHP
		foreach ($bc_cli_msc as $cliente): ?>
		
			<tbody >
			
				<tr class="td_center"  >
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
						<?PHP echo $cliente->cli_telefono1; ?>
					</td>

					<td>
						<?PHP echo $cliente->msc_nombre; ?>
					</td>

					<td>
						<?PHP echo $cliente->rz_nombre; ?>
					</td>

					<td>
						<?PHP 
							if($cliente->msc_sexo == 1) echo ' Macho';
							elseif($cliente->msc_sexo == 2) echo 'Hembra';
							?>
					</td>

					<td>
						<?PHP echo $cliente->msc_medida; ?>
					</td>
					
					<td>
						
						<a href="<?PHP echo base_url()?>clientes/dameClienteEditar/<?=$cliente->id_cliente?>" 
							alt="Editar" title="Editar" tabindex="-1"> 
							<span class="btn btn-success navbar-right" role="button">
								Ir a Ficha &nbsp;	
                             	<i class="mdi-action-assignment" border='0' ></i>
                             </span>
						</a>
						
					</td>
					
				</tr>
				
			</tbody>



		<?PHP  endforeach;

			?>


		</table>



			<?PHP
	}else{
		echo "<p> No se ha encontrado ningún registro con la búsqueda</p>";



		?>

		

	<?PHP
	}



?>
