<form action="<?PHP echo base_url()?>mascotas/dameMascotaTexto_add_cliente" method="POST" name="form_ficha_mascota"> 
	<input name="b_texto" id="b_texto" size="35%" pattern="\S{2,20}" placeholder="Nombre de la mascota"></input>
	<button type="submit" class="btn btn-primary btn-raised" name="guardar">Buscar</button>
	<button type="reset" class="btn btn-default btn-raised" name="Limpiar">Limpiar</button>
	
		<a href="<?PHP echo base_url()?>mascotas/dameMascotas" alt="Limpiar" title="Limpiar" > 
			<span class="btn btn-default btn-raised">
				<h5><i class="mdi-action-autorenew"></i></h5>
			</span>
		</a>
	
</form>