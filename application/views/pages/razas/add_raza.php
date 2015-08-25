<h2>Añadir Nueva Raza</h2>

<form action="<?PHP echo base_url()?>mascotas/add_nueva_raza" method="POST" name="form_add_raza">
	<table>
		<tr>
			<td><label>Raza &nbsp;</label></td>
			<td><input name="rz_nombre" size="50%" autofocus required class="form-control" onKeyUp="this.value = this.value.toUpperCase();"></input></p></td>

		</tr>
		<tr>
			<td><label>Descripción &nbsp;</label></td>
			<td><input name="rz_descripcion" size="100%" class="form-control" onKeyUp="this.value = this.value.toUpperCase();"></input></p></td>

		</tr>
		<tr>
		</tr>
		<tr>
			<td>
				<button type="reset" class="btn btn-default btn-raised pull-left" name="Limpiar">Limpiar</button> 
			</td>
			<td>
				<button type="submit" class="btn btn-primary btn-raised pull-left" name="guardar">Guardar</button>
			</td>
		</tr>
</table>

</form>