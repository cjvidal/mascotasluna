<?PHP

	if($serv_mascotas){ ?>

		<h3>Ficha Técnica</h3>
		<table class="table" >
			<thead class="tableHeadClientes">
				<tr>
					<td> Fecha </td>
					<td> Corte </td>
					<td> Nº. Máquina </td>
					<td> Tiempo </td>
					<td> Observaciones </td>
					<td> Observaciones Privadas </td>
					<td> Problemas Médicos </td>
				</tr>
			</thead><?PHP
		foreach ($serv_mascotas as $serv_msc): ?>
		
			<tbody class="">
			
				<tr >
					<td>

						
						<?PHP 

						$originalDate = $serv_msc->serv_fecha;
						$newDate = date("d-m-Y", strtotime($originalDate));
						echo $newDate;

							

								//echo $serv_msc->serv_fecha;

						?>
					</td>
					<td>
						<?PHP if($serv_msc->serv_corte == 1 ) echo ' Máquina';?>
						<?PHP if($serv_msc->serv_corte == 2 ) echo ' Tijera';?>
						<?PHP if($serv_msc->serv_corte == 3 ) echo ' Striping';?>
						<?PHP if($serv_msc->serv_corte == 4 ) echo ' Grooming';?>
					</td>
					<td class="td_center">
						<?PHP echo $serv_msc->serv_acc1; ?>
					</td>
					<td class="td_center">
						<?PHP echo $serv_msc->serv_acc2; ?>
					</td>
					<td>
						<?PHP echo $serv_msc->serv_observaciones; ?>
					</td>
					<td>
						<?PHP echo $serv_msc->serv_observ_priv; ?>
					</td>
					<td>
						<?PHP echo $serv_msc->serv_problemas_medicos; ?>
					</td>
					
					<td>
						
							<a href="<?PHP echo base_url()?>servicios/obtener_servicio_editar/<?PHP echo $serv_msc->id_servicio?>/<?PHP echo $serv_msc->serv_id_mascota; ?>" 
								alt="Editar" title="Editar" tabindex="-1"> 
								<span class="btn btn-success navbar-right" role="button" tabindex="-1">
									Editar Servicio &nbsp;	
                             		 <i class="mdi-action-assignment" border='0' tabindex="-1" ></i>
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
		echo "<p> <h3>No hay servicios definidos para esta mascota </h3></p>";
	}



?>
