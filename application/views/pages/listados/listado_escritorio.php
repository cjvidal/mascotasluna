<?PHP

	if($listado_escritorio){?>

		<h2>Plan de Trabajo</h2>
		<div class="row">

			<?PHP
			foreach ($listado_escritorio as $lst_escritorio): ?>
			
				<div id="caja" class="col-xs-6 col-sm-4 col-md-3 col-lg-3">

				    <div class="panel panel-primary">
				       
					        <div class="panel-heading">
							<a href="<?= base_url()?>mascotas/dameMascotaEditar/<?= $lst_escritorio->id_mascota; ?>">
								
								
						        	<h3 class="panel-title"><?= $lst_escritorio->cli_nombre; ?></h3>
									<b><h4><?= $lst_escritorio->cli_telefono1; ?></b></h4>

						       </a>  	
					        	
					        </div>
				       
			            <div class="panel-body">
			            	
			            		<p >Nombre: <b class="nombre_mascota"><?= $lst_escritorio->msc_nombre; ?></b></p>
			            		<p>Sexo:  
			            			<?PHP 

			            			if ($lst_escritorio->msc_sexo == 1) {
			            				echo 'Macho';
			            			}else{
			            				echo 'Hembra';
			            			}

			            		

			            		?></p>
			            		<p>Raza: <b><?= $lst_escritorio->rz_nombre; ?></b></p>
			            		<p>Medida: <?= $lst_escritorio->msc_medida; ?></p>
			            		<p>Color: <?= $lst_escritorio->msc_color; ?></p>  
			            		<p>P. Médicos: <b class="msc_p_medicos"><?= $lst_escritorio->msc_problemas_medicos; ?></b></p>  

			            		<b><h3 class="panel-body cliente_debe"><?= $lst_escritorio->cli_debe; ?></h3></b>
			            </div>
				    </div>
				</div>

			<?PHP endforeach; ?>
		</div>




			<?PHP
	}else{
		echo "<p> No se ha encontrado ningún registro con la búsqueda</p>";



		?>

		

	<?PHP
	}



?>