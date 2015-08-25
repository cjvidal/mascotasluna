<?PHP


//Parametros FECHA Y HORA
        $this->load->helper('date');
        
        date_default_timezone_set("Europe/Madrid");
        $fecha  = date('Y-m-d');
/*
        $fecha =date('YYYY - mm - dd');
        $dia = substr($fecha, 0, 2);
        $mes   = substr($fecha, 3, 2);
        $ano = substr($fecha, -4);
        // fechal final realizada el cambio de formato a las fechas europeas
        $fecha = $dia . '-' . $mes . '-' . $ano; 
*/
        $hora = date('H:i:s');

    if($mascotas){?>


<?PHP
?>

<h3>Datos de la Mascota</h3>


<?PHP
        foreach ($mascotas as $mascota): ?>

		  
            <div class="row">
                <form action="<?PHP echo base_url()?>mascotas/editar" method="POST" id="form_ficha_mascota" name="form_ficha_mascota" tabindex="-1"  >
                        <div class="inputs">
                             <div class="col-md-12 col-lg-12">
                                  <div class="checkbox pull-right col-md-12 col-lg-3">
                                    <label>
                                      <input onclick="submit()" 
                                      name="msc_escritorio" 
                                      tabindex="-1"
                                      value="1" 
                                      type="checkbox" 
                                      <?PHP if($mascota->msc_escritorio == 1) echo ' checked';?> >
                                       <b>Mostrar </b> en Plan de Trabajo.
                                    </label>
                                  </div>
                                <div class="col-md-12 col-lg-8">
                                  <input name="msc_nombre" 
                                            value="<?PHP echo $mascota->msc_nombre; ?>" 
                                            type="text" class="form-control nombreMascota" 
                                            onKeyUp="this.value = this.value.toUpperCase();"
                                            required  />
                                </div>
                             </div>
                            <div class="col-md-12 col-lg-12">
                                <input name="id_mascota" type="hidden" value="<?PHP echo $mascota->id_mascota; ?>"  />
                                
                                
                            
                                <div class="row">
                                    <div class="col-xs-4 col-md-4 col-lg-4">
                                        <div class="sexo">
                                            <div class="radio radio-success" required>
                                                <label><input type="radio" name="msc_sexo" tabindex="-1" value="1" <?PHP if($mascota->msc_sexo == 1) echo ' checked';?> >Macho</label>
                                                <label><input type="radio" name="msc_sexo" tabindex="-1" value="2" <?PHP if($mascota->msc_sexo == 2 OR $mascota->msc_sexo == '') echo ' checked';?> >Hembra</label>
                                            </div>  
                                        </div> <!-- Fin Div Sexo -->
                                    </div>

                                    <div class="col-xs-4 col-md-4 col-lg-4">
                         
                                        <div class="col-xs-4 col-md-4 col-lg-2">
                                            <label for="select" class=" control-label">Raza</label>
                                        </div>
                                        <div class="col-xs-4 col-md-4 col-lg-6">
                                             <select name="msc_raza"  class="">
                                                <option></option>
                                             <?PHP 

                                            foreach ($razas as $raza): 
                                                    

                                                    if ($raza->rz_nombre == $mascota->rz_nombre){
                                                        echo '<option selected>'.$raza->rz_nombre.'</option>';
                                                    }else
                                                        echo '<option>'.$raza->rz_nombre.'</option>'

                                                ?> 

                                                <?PHP endforeach;



                                                ?>

                                                
                                            </select>
                                        </div>
                                
                                    </div>
                                
                                
                                    
                                    <div class="col-lg-4">
                                        <div class="col-xs-2 col-md-2 col-lg-2">
                                            <label  class="control-label">Medida </label>
                                        </div>
                                        <div class="col-xs-4 col-md-4 col-lg-6">
                                            <select name="msc_medida" class="" id="select" >
                                        
                                        
                                                <option></option>
                                                <?PHP 
                                                    if ($mascota->msc_medida == "Pequeño") {
                                                        echo "<option selected >Pequeño</option>";
                                                    }else{
                                                         echo "<option>Pequeño</option>";
                                                    }

                                                    if ($mascota->msc_medida == "Pequeño Extra") {
                                                        echo "<option selected >Pequeño Extra</option>";
                                                    }else{
                                                         echo "<option>Pequeño Extra</option>";
                                                    }

                                                    if ($mascota->msc_medida == "Mediano") {
                                                        echo "<option selected >Mediano</option>";
                                                    }else{
                                                         echo "<option>Mediano</option>";
                                                    }

                                                    if ($mascota->msc_medida == "Mediano Extra") {
                                                        echo "<option selected >Mediano Extra</option>";
                                                    }else{
                                                         echo "<option>Mediano Extra</option>";
                                                    }

                                                    if ($mascota->msc_medida == "Grande") {
                                                        echo "<option selected >Grande</option>";
                                                    }else{
                                                         echo "<option>Grande</option>";
                                                    }

                                                    if ($mascota->msc_medida == "Grande Extra") {
                                                        echo "<option selected >Grande Extra</option>";
                                                    }else{
                                                         echo "<option>Grande Extra</option>";
                                                    }

                                                    if ($mascota->msc_medida == "Gigante") {
                                                        echo "<option selected >Gigante</option>";
                                                    }else{
                                                         echo "<option>Gigante</option>";
                                                    }

                                                    ?>
                                               
                                            </select>
                                        </div>

                                    </div>
                                    <div class"row">
                                        <div class="col-xs-2 col-md-2 col-lg-12">
                                            <input name="msc_raza_obs" 
                                            placeholder="Observaciones RAZA" 
                                            class="form-control" type="text"
                                            onKeyUp="this.value = this.value.toUpperCase();" 
                                            value="<?PHP echo $mascota->msc_raza_obs; ?>"/>
                                        </div>
                                    </div>
                                     <br/><br/><br/>

                                    <div class="col-lg-12 ">
                                                 <input name="msc_problemas_medicos" 
                                        value="<?PHP echo $mascota->msc_problemas_medicos; ?>" 
                                        type="text" 
                                        class="form-control msc_p_medicos" 
                                        placeholder="Problemas Médicos"  
                                        onKeyUp="this.value = this.value.toUpperCase();"
                                        />
                                    </div>

                            </div>

                                 <div class="col-xs-4 col-md-4 col-lg-4">
                                    <label for="text">Fecha de Nacimiento </label> <input  name="msc_fecha_nac" 
                                        value="<?PHP echo $mascota->msc_fecha_nac; ?>" 
                                        type="text"  />
                                </div>

                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <input name="msc_color" 
                                            value="<?PHP echo $mascota->msc_color; ?>" 
                                            type="text" 
                                            class="form-control" 
                                            placeholder="Color" 
                                            onKeyUp="this.value = this.value.toUpperCase();"
                                            />
                                </div>
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <input name="msc_caracter" 
                                            value="<?PHP echo $mascota->msc_caracter; ?>" 
                                            type="text" class="form-control" 
                                            placeholder="Carácter"  
                                            onKeyUp="this.value = this.value.toUpperCase();"
                                            />
                                </div>
                               
                               
                            </div>
                            <div>
                                <div class="row pull-left">
                                    <div class="col-lg-6 col-md-6 ">
                                        <a
                                        id="btn_add_serv"
                                         href="" class="btn btn-sm btn-success"
                                        data-backdrop="static"
                                        data-keyboard="true"
                                        data-toggle="modal"
                                        data-target="#datotecnico"
                                        
                                        > <h2><i class="mdi-content-add-circle-outline"></i></h2> Añadir Servicio</a>
                                    </div>
                                    
                                </div>
                            </div> <!-- Fin div MuestraMascotas -->
                            <div>
                                <div class="row pull-left">
                                    <div class="col-lg-6 col-md-6 ">
                                        <a href="" class="btn btn-sm btn-default"
                                        data-backdrop="static"
                                        data-keyboard="true"
                                        data-toggle="modal"
                                        data-target="#cambiopropietario"> <h2><i class="mdi-content-add-circle-outline"></i></h2>NUEVO Cambio de Propietario</a>
                                    </div>
                                    
                                </div>
                            </div> <!-- Fin div Cambio Propietario -->
                            <div>
                                <div class="row pull-left">
                                    <div class="col-lg-6 col-md-6 ">
                                        <a href="" class="btn btn-sm btn-default"
                                        data-backdrop="static"
                                        data-keyboard="true"
                                        data-toggle="modal"
                                        data-target="#buscarcambiopropietario"> <h2><i class="mdi-content-add-circle-outline"></i></h2>BUSCAR Cambio de Propietario</a>
                                    </div>
                                    
                                </div>
                            </div> <!-- Fin div Buscar Cambio Propietario -->

                            



                             <button type="submit" class="btn btn-primary btn-raised pull-right" name="guardar"><h2><i class="mdi-content-save"></i></h2> Guardar Datos Mascota</button>
                            

                           <!-- <span class="btn btn-danger navbar-right" role="button">
                                <h2><i class="mdi-content-report"></i>  Baja definitiva &nbsp; </h2>
                            </span>-->
                                <!--<a href="<?PHP echo base_url()?>mascotas/dameMascotaBaja/<?PHP echo $mascota->id_mascota?>" alt="Baja" title="Baja" class=" pull-left">-->
                                
                               
                                

                        
                             
                        </div><!-- Fin inputs mascota -->
                   
                </form> <!-- Fin form_ficha_mascota -->
            </div>
		        <form action="<?PHP echo base_url()?>mascotas/dameMascotaBaja/<?PHP echo $mascota->id_mascota?>" method="POST" id="form_baja_mascota" name="form_baja_mascota">          
                    <input type="button" onclick="if (confirm('¿Estas seguro dar de baja esta mascota?')){
            document.form_baja_mascota.submit()
          }" value="Baja definitiva Mascota"  class="btn btn-primary btn-danger pull-right"
          tabindex="-1"></input>        
                </form>




                            <!-- Inicio DATOS TÉCNICO -->

                            <div class="modal fade" id="datotecnico" name="datotecnico" 
                                role="dialog" aria-labelledby="datotecnico" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" >
                                            <button type="button" class="close" data-dismiss="modal" 
                                                    aria-label="Cerrar" 
                                                    tabindex="-1"
                                                    >
                                                    <span aria-hidden="true" tabindex="-1" >×</span>
                                                </button>
                                                <h2 class="modal-title" id="myModalLabel">
                                                   Datos del Servico para <b><?PHP echo $mascota->msc_nombre; ?></b>
                                                </h2>
                                        </div>
                                        <div class="modal-body"  >
                                            <div class="row" ><!-- Row para form del cliente -->
                                                <form action="<?PHP echo base_url()?>servicios/add_servicio_msc/<?PHP echo $mascota->id_mascota?>" 
                                                    method="POST" 
                                                    name="form_dato_tecnico_msc"
                                                    id="form_dato_tecnico_msc"
                                                    tabindex="-1"
                                                    >
                                                    <div id="caja_cliente" class="col-lg-12 col-md-12" >
                                                        <div class="inputs">
                                                            <div class="col-md-12 col-lg-12">
                                                                <!--<input name="cli_dni" type="text" class="form-control" placeholder="DNI" auto-complete="ON" autofocus="true" required />-->
                                                                <div class="row">
                                                                <div class="col-md-6 col-lg-6">
                                                                    <input  name="serv_fecha"
                                                                            id="serv_fecha_modal" 
                                                                            type="date" 
                                                                            autofocus
                                                                            placeholder="FECHA DEL SERVICIO" 
                                                                            tabindex="1"
                                                                            
                                                                            required 
                                                                            
                                                                            />
                                                                </div>
                                                                <div class="col-md-6 col-lg-6">
                                                                    <br>
                                                                </div>
                                                            </div>
                                                               
                                                                    <div class="radio radio-success" required>
                                                                        <label><input type="radio" name="serv_corte" value="1" checked>Máquina</label>
                                                                        <label><input type="radio" name="serv_corte" value="2">Tijera</label>
                                                                        <label><input type="radio" name="serv_corte" value="3">Stripping</label>
                                                                        <label><input type="radio" name="serv_corte" value="4">Grooming</label>
                                                                    </div>  
                                                    
                                                                <input name="serv_acc1" type="text" class="form-control" placeholder="Número Máquina" 
                                                                            onKeyUp="this.value = this.value.toUpperCase();"
                                                                            auto-complete="ON" />
                                                                <input name="serv_acc2" type="text" class="form-control" placeholder="Tiempo" 
                                                                            onKeyUp="this.value = this.value.toUpperCase();"
                                                                            auto-complete="ON" />
                                                                <input name="serv_acc3" type="hidden" class="form-control" placeholder="Obs3" 
                                                                            onKeyUp="this.value = this.value.toUpperCase();"
                                                                            auto-complete="ON" />
                                                                <input name="serv_acc4" type="hidden" class="form-control" placeholder="Obs4" 
                                                                            onKeyUp="this.value = this.value.toUpperCase();"
                                                                            auto-complete="ON" />

                                                                <textarea id="serv_observaciones" 
                                                                            name="serv_observaciones" 
                                                                            type="text" 
                                                                            class="form-control" 
                                                                            placeholder="Observaciones"  
                                                                            onKeyUp="this.value = this.value.toUpperCase();"
                                                                            ></textarea>
                                                                <textarea name="serv_observ_priv" 
                                                                            type="text" 
                                                                            class="form-control" 
                                                                            onKeyUp="this.value = this.value.toUpperCase();"
                                                                            placeholder="Observaciones Privadas"  ></textarea>

                                                                <input name="serv_problemas_medicos" type="text" class="form-control"
                                                                            onKeyUp="this.value = this.value.toUpperCase();"
                                                                                 placeholder="Problemas Médicos" auto-complete="ON" />
                                                            </div>
                                                        
                                            

                                                            <button type="submit" class="btn btn-primary btn-raised pull-right" name="guardar">Guardar</button>
                                                             <button type="reset" class="btn btn-default btn-raised pull-right" name="Limpiar">Limpiar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fin Dato Técnico -->


        <?PHP endforeach;

            ?>

  <!-- Inicio DATOS CAMBIO PROPIETARIO -->

                            <div class="modal fade" id="cambiopropietario"
                                role="dialog" aria-labelledby="cambiopropietario" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" 
                                                    aria-label="Cerrar"><span aria-hidden="true">×</span>
                                                </button>
                                                <h2 class="modal-title" id="myModalLabel">
                                                    <b><?PHP echo $mascota->msc_nombre; ?></b> va a cambiar de Propietario
                                                </h2>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row"><!-- Row para form del cliente -->
                                                <form action="<?PHP echo base_url()?>mascota_cliente/cambia_propietario/<?PHP echo $mascota->id_mascota?>" method="POST" name="form_cambio_pro" id="form_cambio_pro" >
                                                    <div id="caja_cliente" class="col-lg-12 col-md-12">
                                                        <div class="inputs">
                                                            <div class="col-md-12 col-lg-12">
                                                                <!--<input name="cli_dni" type="text" class="form-control" placeholder="DNI" auto-complete="ON" autofocus="true" required />-->
                                                               
                                                               
                                                        
                                                    <div class="col-xs-12 col-md-12 col-lg-12">
                                                            <h2>Datos del Cliente</h2>
                                                            <!--<input name="cli_dni" type="text" class="form-control" placeholder="DNI" auto-complete="ON" autofocus="true" required />-->
                                                            <input name="cli_nombre" type="text" class="form-control" placeholder="Nombre" auto-complete="ON" autofocus="true" required  />
                                                            <div class="row">
                                                                <div class="col-xs-12 col-md-6 col-lg-6">
                                                                    <input name="cli_apellido1" type="text" class="form-control" placeholder="Apellido1" auto-complete="ON"  required/>
                                                                </div>
                                                                <div class="col-xs-12 col-md-6 col-lg-6">
                                                                    <input name="cli_apellido2" type="text" class="form-control" placeholder="Apellido2" auto-complete="ON" />
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-xs-12 col-md-6 col-lg-6">
                                                                    <textarea name="cli_direccion" type="text" class="form-control" placeholder="Dirección"  ></textarea>
                                                                </div>
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-md-6 col-lg-3">
                                                                            <input name="cli_poblacion" type="text" class="form-control" placeholder="Población" auto-complete="ON"  />
                                                                        </div>

                                                                        <div class="col-xs-12 col-md-6 col-lg-2">

                                                                            <input  name="cli_cp" 
                                                                                    type="text" 
                                                                                    class="form-control" 
                                                                                    placeholder="CP" 
                                                                                    auto-complete="ON" 
                                                                                    pattern="[0-9]{5}"  
                                                                                    maxlength="5" 
                                                                                    tabindex="6"
                                                                                    />
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                         
                                                        
                                                        </div>
                                                       <div class="col-md-12 col-lg-12">
                                                            <div class="row">
                                                                <div class="col-xs-3 col-md-3 col-lg-3">
                                                                    <input  name="cli_telefono1"  
                                                                            type="text" 
                                                                            class="form-control" 
                                                                            placeholder="Teléfono 1"  
                                                                            pattern="[0-9]{9}" 
                                                                            required 
                                                                            maxlength="9" 
                                                                            tabindex="7"
                                                                            />
                                                                </div>
                                                                <div class="col-xs-9 col-md-9 col-lg-9">
                                                                    <input name="cli_obs_tel1" type="text" class="form-control" placeholder="Observaciones Teléfono 1" tabindex="8" />
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="row">
                                                                <div class="col-xs-3 col-md-3 col-lg-3">
                                                                    <input  name="cli_telefono2" 
                                                                            type="text" 
                                                                            class="form-control" 
                                                                            placeholder="Teléfono 2" 
                                                                            pattern="[0-9]{9}"  
                                                                            maxlength="9" 
                                                                           tabindex="9"
                                                                            />
                                                                </div>
                                                                <div class="col-xs-9 col-md-9 col-lg-9">
                                                                    <input name="cli_obs_tel2" type="text" class="form-control" placeholder="Observaciones Teléfono 2" tabindex="10"/>
                                                                </div>
                                                            </div>
                                                      
                                                            <input name="cli_conocio" type="text" class="form-control" placeholder="¿Cómo nos conoció?" tabindex="11"  />
                                                            <input name="cli_email" type="text" class="form-control" placeholder="EMAIL" tabindex="12"  />
                                                            <div class="row">
                                                                <div class="radio radio-success" tabindex="13">
                                                                    <label>Firma Ley de Protección de Datos</label>
                                                                    <label><input type="radio" name="cli_lpd" value="1"  >Sí</label>
                                                                    <label><input checked type="radio" name="cli_lpd" value="2" >No</label>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-3 col-md-3 col-lg-3">
                                                                    <input  name="cli_telefono_contacto2" 
                                                                            type="tel" class="form-control" 
                                                                            placeholder="Teléfono segundo contacto" 
                                                                            pattern="[0-9]{9}"  
                                                                            maxlength="9" 
                                                                            onkeydown="return justNumbers(event);" tabindex="14"
                                                                             />    
                                                                </div>
                                                                <div class="col-xs-9 col-md-9 col-lg-9">
                                                                    <input name="cli_contacto2" type="text" class="form-control" placeholder="Nombre segundo contacto" tabindex="15" />
                                                                </div>
                                                                                                 
                                                               </div>
                                                            </div>
                                                        
                                            </div>

                                                            <button type="submit" value="Guardar" onclick="pregunta_cambio_pro()" class="btn btn-primary btn-raised pull-right" >Guardar</button>
                                                           
                                                             <button type="reset" class="btn btn-default btn-raised pull-right" name="Limpiar">Limpiar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fin Dato Técnico -->





  <!-- Inicio BUSCAR DATOS CAMBIO PROPIETARIO -->

        <div class="modal fade" id="buscarcambiopropietario" tabindex="-1" 
            role="dialog" aria-labelledby="buscarcambiopropietario" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" 
                                aria-label="Cerrar"><span aria-hidden="true">×</span>
                            </button>
                            <h2 class="modal-title" id="myModalLabel">
                                Mascota <b><?PHP echo $mascota->msc_nombre; ?></b> Buscar Propietario 
                            </h2>
                    </div>
                    <div class="modal-body">
                        <div class="row"><!-- Row para form del cliente -->
                            <form action="<?PHP echo base_url()?>mascota_cliente/dame_bc_busca_cambia_cli_pro/<?PHP echo $mascota->id_mascota?>" method="POST" name="form_buscar_cambio_pro" id="form_cambio_pro" >
                           
                                <div class="col-lg-10">
                        <p><input name="bc_nombre" id="bc_nombre" placeholder="Nombre" size="50%" ></input></p>
                        <p><input name="bc_apellido1" id="bc_apellido1" pattern="\S{4,20}" placeholder="Primer Apellido" size="50%"  autofocus></input></p>
                        <p><input name="bc_apellido2" id="bc_apellido2"  placeholder="Segundo Apellido" size="50%" ></input></p>
                        <p><input   name="bc_telefono" 
                                    id="bc_telefono" 
                                    type="tel"  
                                    placeholder="Teléfono" 
                                    pattern="[0-9]{9}"
                                    maxlength="9" 
                                     
                                    size="50%" 
                                    >
                            </input>
                        </p>
                    </div>

                    <br>

            

            <button type="submit" class="btn btn-primary btn-raised pull-left" name="guardar">Buscar</button>
            <button type="reset" class="btn btn-default btn-raised pull-left" name="Limpiar">Limpiar</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script type="text/javascript">
    funcion(){
    alert('Hola');
}
    </script>





    <?PHP
    }else{
        echo "<p> Error en la aplicación, no se han encontrado los datos de la mascota </p>";
    }


?>





