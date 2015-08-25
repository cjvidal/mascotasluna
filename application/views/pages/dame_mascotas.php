<?PHP

	if($mascotas){?>

	

<h2>Listado de Mascotas</h2>

		<table class="table table-striped table-hover">
			<thead class="tableHeadMascotas">
				<tr>
					<td> Nombre </td>
					<td> Sexo </td>
					<td> Raza </td>
					<td> Medida </td>
					<td> Color </td>
					<td> Fecha Nacimiento </td>
					<td><center>Plan de Trabajo</center>  </td>
				</tr>
			</thead><?PHP
		foreach ($mascotas as $mascota): ?>
		
			<tbody class="">
			
				<tr >
					<td>
						<?PHP echo $mascota->msc_nombre; ?>
					</td>
					<td>
						<?PHP 
							if($mascota->msc_sexo == 1) echo ' Macho';
							elseif($mascota->msc_sexo == 2) echo 'Hembra';
							?>
					</td>
					<td>
						<?PHP echo $mascota->rz_nombre; ?>

					</td>
					<td>
						<?PHP echo $mascota->msc_medida; ?>
					</td>
					<td>
						<?PHP echo $mascota->msc_color; ?>
					</td>
					<td>

						<?PHP 

/*						$originalDate = $mascota->msc_fecha_nac;
						$newDate = date("d-m-Y", strtotime($originalDate));
						echo $newDate;
*/
						echo $mascota->msc_fecha_nac;		

						?>

						
					</td>
					<td>
						<center>
							<?PHP  

								if($mascota->msc_escritorio == 1){
									?><b><?echo 'Sí';?></b><?PHP
								}else{
									echo '';
								}

								

						        ?>

						</center>
					</td>
					<td>
						
							<!--<a href="">Ir a Ficha de <?PHP echo $mascota->id_mascota; ?></a>-->
							<a href="<?PHP echo base_url()?>mascotas/dameMascotaEditar/<?PHP echo $mascota->id_mascota?>" 
								alt="Editar" title="Editar" class="textoblanco" tabindex="-1">
								<span class="btn btn-success navbar-right" role="button">
										Ir a Ficha &nbsp;
								
									<i class="mdi-action-assignment" tabindex="-1"></i>  
								</span>	 
							</a>

						
					</td>
				</tr>
				
			</tbody>


		<?PHP endforeach;

			?></table><?PHP
	}else{
		echo "<p> No hay resultados de mascotas para esta búsqueda.</p>";
	}


?>
