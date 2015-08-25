<form action="<?PHP echo base_url()?>clientes/dameClienteTexto" method="POST" name="form_ficha_mascota"> 
	<input name="b_texto" id="b_texto" size="35%" placeholder="Introduzca texto a buscar"></input>
	<button type="submit" class="btn btn-primary btn-raised" name="guardar">Buscar</button>
	<button type="reset" class="btn btn-default btn-raised" name="Limpiar">Limpiar</button>
	<span class="btn btn-default btn-raised">
		<a href="<?PHP echo base_url()?>clientes/dameClientes" alt="Limpiar" title="Limpiar" > 
			
			<h5><i class="mdi-action-autorenew"></i></h5>
	       

		</a>
	</span>
	<p><i>Buscar sólo para (Nombre | 1º Apellido | 2º Apellido | Teléfono) por spearado.</i></p>
</form>