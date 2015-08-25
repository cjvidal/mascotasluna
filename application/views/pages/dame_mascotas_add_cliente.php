<?PHP

	if($mascotas){?>

	

<h2>Listado de Mascotas</h2>

		<table class="table table-striped table-hover">
			<thead class="tableHeadMascotas">
				<tr>
					<td> Nombre </td>
					<td> Sexo </td>
					<td> Raza </td>
					<td> Fecha Nacimiento </td>
					<td><center>Escritorio</center>  </td>
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
						<?PHP echo $mascota->msc_fecha_nac; ?>
					</td>
					<td>
						<center>
							<?PHP  

								if($mascota->msc_escritorio == 1){
									?><b><?echo 'Sí';?></b>
								<?PHP
								}else{
									echo '';
								}
						        ?>

						</center>
					</td>
					<td>
						
							<!--<a href="">Ir a Ficha de <?PHP echo $mascota->id_mascota; ?></a>-->
							<a href="<?php base_url()?>../mascota_cliente/add_msc_a_cliente_busca/<?php echo $mascota->id_mascota?>" 
								alt="Editar" title="Editar" class="textoblanco">
								<span class="btn btn-success navbar-right" role="button">
										Añadir a cliente &nbsp;
								
									<i class="mdi-action-assignment"></i>  
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
