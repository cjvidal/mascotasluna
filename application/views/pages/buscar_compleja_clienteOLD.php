<h3>Datos para la búsqueda del Cliente </h3>

<form action="<?PHP echo base_url()?>clientes/dameClienteBuscarCompleja" method="POST" name="form_buscar_compleja_cliente"> 
	<p><input name="bc_nombre" id="bc_nombre" size="45%"  placeholder="Nombre" ></input></p>
	<p><input name="bc_apellido1" id="bc_apellido1" size="85%" pattern="\S{2,20}" placeholder="Primer Apellido"  autofocus></input></p>
	<p><input name="bc_apellido2" id="bc_apellido2" size="85%"  placeholder="Segundo Apellido"></input></p>
	<p><input 	name="bc_telefono" 
				id="bc_telefono" 
				type="tel"  
				size="15%" 
				placeholder="Teléfono" 
                pattern="[0-9]{9}"
                maxlength="9" 
               
				>
		</input>
	</p>

<br>
	<button type="submit" class="btn btn-primary btn-raised pull-left" name="guardar">Buscar</button>
	<button type="reset" class="btn btn-default btn-raised pull-left" name="Limpiar">Limpiar</button>
<hr>
<br>	
</form>