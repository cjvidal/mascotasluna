
<div class="row">
	<div class="col-lg-12">
		

		<form action="<?PHP echo base_url()?>mascota_cliente/dame_bc_cliente_mascota" method="POST" name="form_buscar_compleja_cliente"> 
			<div class="row">
				<div class="col-lg-6">
					<h3>Datos Cliente </h3>
					
					<div class="col-lg-10">
						<p><input 	name="bc_nombre" 
									id="bc_nombre" 
									placeholder="Nombre" 
									size="50%" 
									onKeyUp="this.value = this.value.toUpperCase();" >
								</input></p>
						
						<p><input name="bc_apellido1" id="bc_apellido1" pattern="\S{2,20}" 
							onKeyUp="this.value = this.value.toUpperCase();"
							placeholder="Primer Apellido" size="50%"  autofocus></input></p>
						<p><input name="bc_apellido2" id="bc_apellido2"  
							onKeyUp="this.value = this.value.toUpperCase();"
							placeholder="Segundo Apellido" size="50%" ></input></p>
						<p><input 	name="bc_telefono" 
									id="bc_telefono" 
									type="tel"

									placeholder="Teléfono" 
		                			maxlength="10"  
		                			size="50%" 
									>
							</input>
						</p>
					</div>


				</div>

				<div class="col-lg-6">
					<h3>Datos Mascota </h3>
					<p><input name="bc_msc_nombre" id="b_texto" size="50%" pattern="\S{2,20}" placeholder="Nombre de la mascota"></input></p>
					<div class="sexo">
	                    <div class="radio radio-success" required>
	                        <label><input type="radio" name="bc_msc_sexo" value="1" >Macho</label>
	                        <label><input type="radio" name="bc_msc_sexo" value="2">Hembra</label>
	                    </div>  
            		</div> <!-- Fin Div Sexo -->
					<div class="col-xs-4 col-md-4 col-lg-6">
                         <!--<input name="msc_raza" type="text" class="form-control" placeholder="Raza" tabindex="19" />-->
                        <div class="col-xs-4 col-md-4 col-lg-2">
                                <label for="select" class=" control-label">Raza</label>
                        </div>
                        <div class="col-xs-4 col-md-4 col-lg-6">
                             <select name="bc_msc_raza" class="">
                                <option></option>
                                 <?PHP 

                                     foreach ($razas as $raza): 
                                            
                                        ?>
                                    <option><?PHP echo $raza->rz_nombre; ?></option>
                                <?PHP endforeach;

                            ?>
                            </select>
                        </div>
                    </div>

					<!--<p><input name="bc_msc_raza" id="b_texto" size="50%" pattern="\S{2,20}" placeholder="Raza"></input></p>-->
					
            		<div class="col-lg-6">
	            		<div class="col-xs-4 col-md-4 col-lg-3">
                            <label for="select" class="control-label">Medida</label>
                        </div>
	                    <div class="col-xs-4 col-md-4 col-lg-8">
	            			<select name="bc_msc_medida" class="" id="select">
                                <option></option>
                                <option>Pequeño</option>
                                <option>Pequeño Extra</option>
                                <option>Mediano</option>
                                <option>Mediano Extra</option>
                                <option>Grande</option>
                                <option>Grande Extra</option>
                                <option>Gigante</option>
                               
                            </select>
	                     </div>
	                 </div>
				</div>
			</div>	
			

		<br>

			

			<button type="submit" class="btn btn-primary btn-raised pull-left" name="guardar">Buscar</button>
			<button type="reset" class="btn btn-default btn-raised pull-left" name="Limpiar">Limpiar</button>
		<hr>
		<br>	
		</form>


	</div>
</div> <!--Fin del Row principal -->