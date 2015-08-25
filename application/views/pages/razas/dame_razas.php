<?PHP


	if (isset($razas)) { ?>

	<h2>Listado de Razas</h2>
		<table class="table table-striped table-hover">
			<thead class="tableHeadMascotas">
				<tr>
					<td class="td_center"> Raza </td>
					<td class="td_center"> Descripción </td>
					
				</tr>
			</thead><?PHP
		foreach ($razas as $raza): ?>
		
			<tbody >
			
				<tr  >
					<td valign="middle">
						<?PHP echo $raza->rz_nombre; ?>
					</td>
					<td>
						<?PHP echo $raza->rz_descripcion; ?>
					</td>
					<td>
						<a href="<?PHP base_url()?>pre_editar_raza/<?PHP echo $raza->id_raza?>" 
							alt="EDITAR" title="EDITAR" class="textoblanco"
							
                                        >
							<span class="btn btn-success navbar-right" role="button">
								<i class="mdi-action-assignment"></i>  
							</span>	 
						</a>
						
						<!--
						<a href="<?= base_url()?>mascotas/eliminar_raza/<?=$raza->id_raza; ?>" 
							alt="ELIMINAR" title="ELIMINAR" class="textoblanco">
							<span class="btn btn-danger navbar-right" role="button">
								<i class="mdi-action-highlight-remove"></i>  
							</span>	 
						</a>
					-->
					</td>
					
				</tr>
				
			</tbody>



		<?PHP endforeach;

			?>


		</table>



			<?PHP
	}else{
		echo "<p> No se ha encontrado ningún registro en RAZAS</p>";



		?>

<?PHP
}
?>