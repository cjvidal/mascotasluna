<?PHP

    if($clientes){?>

<h3>Datos del Cliente</h3>
<?PHP
        foreach ($clientes as $cliente): 

//Obtengo el id del cliente que se va a editar.
            $id_cliente = $cliente->id_cliente;



            ?>
     

    
    <div class="row"><!-- Row para form del cliente -->
        <form action="<?PHP echo base_url()?>clientes/editar" method="POST" name="form_ficha_cliente" >
            <div id="caja_cliente" class="col-lg-10 col-md-10">
                <div class="inputs">

                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <input name="id_cliente" type="hidden" value="<?PHP echo $cliente->id_cliente; ?>"  />
                        <!--<input name="cli_dni" type="text" class="form-control" placeholder="DNI" auto-complete="ON" autofocus="true" required />-->
                        <input name="cli_nombre" 
                                value="<?PHP echo $cliente->cli_nombre; ?>" 
                                type="text" 
                                class="form-control" 
                                placeholder="Nombre"
                                onKeyUp="this.value = this.value.toUpperCase();" 
                                auto-complete="ON" autofocus="true" required tabindex="1" />
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <input name="cli_apellido1" 
                                        value="<?PHP echo $cliente->cli_apellido1; ?>" 
                                        onKeyUp="this.value = this.value.toUpperCase();"
                                        type="text" class="form-control" placeholder="Apellido1" auto-complete="ON" tabindex="2"/>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <input name="cli_apellido2" 
                                        value="<?PHP echo $cliente->cli_apellido2; ?>" 
                                        type="text" 
                                        class="form-control" 
                                        onKeyUp="this.value = this.value.toUpperCase();"
                                        placeholder="Apellido2" auto-complete="ON" tabindex="3"/>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <textarea name="cli_direccion" value="<?PHP echo $cliente->cli_direccion; ?>" type="text" class="form-control" placeholder="Dirección" tabindex="4" ><?= $cliente->cli_direccion; ?></textarea>
                            </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-3">
                                        <input name="cli_poblacion" 
                                                value="<?PHP echo $cliente->cli_poblacion; ?>" 
                                                 type="text" class="form-control" 
                                                 onKeyUp="this.value = this.value.toUpperCase();"
                                                 placeholder="Población" auto-complete="ON" tabindex="5" />
                                    </div>

                                    <div class="col-xs-12 col-md-6 col-lg-2">

                                        <input  name="cli_cp" 
                                                value="<?PHP if($cliente->cli_cp > 0) echo $cliente->cli_cp; ?>" 
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
                                        value="<?PHP echo $cliente->cli_telefono1; ?>"
                                        type="tel" 
                                        class="form-control" 
                                        placeholder="Teléfono 1"  
                                        pattern="[0-9]{9}" 
                                        required 
                                        maxlength="9" 
                                        tabindex="7"
                                        />
                            </div>
                            <div class="col-xs-9 col-md-9 col-lg-9">
                                <input name="cli_obs_tel1" 
                                        value="<?PHP echo $cliente->cli_obs_tel1; ?>" 
                                        type="text" class="form-control" 
                                        onKeyUp="this.value = this.value.toUpperCase();"
                                        placeholder="Observaciones Teléfono 1" tabindex="8" />
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-xs-3 col-md-3 col-lg-3">
                                <input  name="cli_telefono2" 
                                        value="<?PHP echo $cliente->cli_telefono2; ?>"
                                        type="tel" 
                                        class="form-control" 
                                        placeholder="Teléfono 2" 
                                        pattern="[0-9]{9}"  
                                        maxlength="9" 
                                        tabindex="9"
                                        />
                            </div>
                            <div class="col-xs-9 col-md-9 col-lg-9">
                                <input  name="cli_obs_tel2" 
                                        value="<?PHP echo $cliente->cli_obs_tel2; ?>"
                                        type="text" 
                                        class="form-control"
                                        onKeyUp="this.value = this.value.toUpperCase();" 
                                        placeholder="Observaciones Teléfono 2" tabindex="10"/>
                            </div>
                        </div>
                  
                        <input  name="cli_conocio" 
                                value="<?PHP echo $cliente->cli_conocio; ?>"
                                type="text" class="form-control"
                                onKeyUp="this.value = this.value.toUpperCase();"
                                placeholder="¿Cómo nos conoció?" tabindex="11"  />
                        <input  name="cli_email" 
                                value="<?PHP echo $cliente->cli_email; ?>"
                                type="hidden" class="form-control" placeholder="EMAIL" tabindex="12"  />
                        <div class="row">
                            <div class="radio radio-success" tabindex="13">
                                <label>Firma Ley de Protección de Datos</label>
                                <label><input type="radio" name="cli_lpd" value="1"  <?PHP if($cliente->cli_lpd == 1) echo ' checked';?>  >Sí</label>
                                <label><input checked type="radio" name="cli_lpd" value="2"  <?PHP if($cliente->cli_lpd == 2 OR $cliente->cli_lpd == '') echo ' checked';?>  >No</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-3 col-md-3 col-lg-3">
                                <input  name="cli_telefono_contacto2" 
                                        value="<?PHP echo $cliente->cli_telefono_contacto2; ?>" 
                                        type="tel" class="form-control" 
                                        placeholder="Teléfono segundo contacto" 
                                        pattern="[0-9]{9}"  
                                        maxlength="9" 
                                        tabindex="14"
                                         />    
                            </div>
                            <div class="col-xs-9 col-md-9 col-lg-9">
                                <input  name="cli_contacto2" 
                                        value="<?PHP echo $cliente->cli_contacto2; ?>"
                                        type="text" class="form-control" 
                                        placeholder="Nombre segundo contacto" tabindex="15" />
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-xs-9 col-md-9 col-lg-9 ">
                                <input  name="cli_debe" 
                                        value="<?PHP echo $cliente->cli_debe; ?>"
                                        type="text" class="form-control cliente_debe" 
                                        placeholder="Anotar aquí los pagos pendientes del cliente" 
                                        tabindex="15" 
                                        maxlenght="100"
                                        />
                            </div>
                        </div>
                    </div>     
                    <button type="submit" class="btn btn-primary btn-raised pull-right" name="guardar" tabindex="24">Guardar</button>
                    <button type="reset" class="btn btn-default btn-raised pull-right" name="Limpiar" tabindex="25">Limpiar</button>
                </div><!--Fin div inputs Propietario-->
            </div> <!-- Fin caja_propietario -->
        </form>
    </div><!-- Fin div row propietario -->
        
                   
        <div id="muestraMascotas">
            <div class="row pull-right">
                <div class="col-lg-6 col-md-6 ">
                    <a href="#" class="btn btn-sm btn-success"
                    data-backdrop="static"
                    data-keyboard="true"
                    data-toggle="modal"
                    data-target="#mascotaModal"> <h2><i class="mdi-content-add-circle-outline"></i></h2> Añadir Mascotas Nueva</a>
                </div>
                
            </div>
        </div> <!-- Fin div MuestraMascotas -->

<?PHP endforeach;

            ?>




    <?PHP
    }else{
        echo "<p> Error en la aplicación </p>";
    }


?>

<!-- Row para Mascota -->
    <div class="modal fade" id="mascotaModal" tabindex="-1" 
        role="dialog" aria-labelledby="mascotaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" 
                           aria-hidden="true"  tabindex="-1">×
                        </button>
                        <h2 class="modal-title " id="myModalLabelMascota">
                           Datos de la Mascota
                        </h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="<?PHP echo base_url()?>/mascota_cliente/add_mascota_a_cliente" method="POST" name="form_ficha_mascota">
                                <div class="inputs">
                                    <div class="col-md-12 col-lg-12">
                                        <input name="id_cliente" type="hidden" value="<?PHP echo $id_cliente; ?>"  tabindex="-1" />
                                        <input name="msc_nombre" 
                                                type="text" 
                                                class="form-control" 
                                                placeholder="Nombre" 
                                                autofocus
                                                required  
                                                onKeyUp="this.value = this.value.toUpperCase();"
                                                tabindex="1"
                                                />
                                        
                                        <div class="sexo">
                                                <div class="radio radio-success" >
                                                    <label><input type="radio" name="msc_sexo" id="msc_sexo"  value="1" checked  >Macho</label>
                                                    <label><input type="radio" name="msc_sexo"  value="2" >Hembra</label>
                                                </div>  
                                        </div> <!-- Fin Div Sexo -->
                                    
                                        
                                        <!--<input name="msc_medida" type="text" class="form-control" placeholder="Medida"  />-->
                                        <div class="col-xs-4 col-md-4 col-lg-12">
                                 <!--<input name="msc_raza" type="text" class="form-control" placeholder="Raza" tabindex="19" />-->
                                            <div class="col-xs-4 col-md-4 col-lg-2">
                                                    <label for="select" class=" control-label">Raza</label>
                                            </div>
                                            <div class="col-xs-4 col-md-4 col-lg-6">
                                                <select name="msc_raza"  class="form-control" tabindex="3">
                                                    <option></option>
                                                     <?PHP 

                                                        foreach ($razas as $raza): 
                                                            if ($raza->rz_nombre == $mascota->rz_nombre){
                                                                echo '<option selected>'.$raza->rz_nombre.'</option>';
                                                            }else
                                                                echo '<option>'.$raza->rz_nombre.'</option>';
                                                        endforeach;
                                                    ?>
                                                </select>
                                             </div>
                                             
                                         </div>
                     
                                         <br/><br/>
                                        <div class="col-xs-4 col-md-4 col-lg-12">
                                 
                                            <div class="col-xs-4 col-md-4 col-lg-2">
                                                <label for="select" class="control-label">Medida</label>
                                            </div>
                                            <div class="col-xs-4 col-md-4 col-lg-6">
                                                <select name="msc_medida" class="form-control" id="select" tabindex="4">
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
                                        <br/><br/>
                                        <div class"row">
                                            <div class="col-xs-2 col-md-2 col-lg-12">
                                                <input name="msc_raza_obs" class="form-control" type="text" placeholder="Observaciones RAZA" tabindex="20"/>
                                            </div>
                                        </div>
                                         <br/><br/>
                                        <div class="col-lg-12">
                                                    <input name="msc_fecha_nac" 
                                                    type="text" 
                                                    class="" 
                                                    placeholder="Fecha Nacimiento"
                                                    onKeyUp="this.value = this.value.toUpperCase();"
                                                    tabindex="5" 
                                                    />
                                        </div>
                                        <div class="col-lg-12">
                                          <p>  <input name="msc_color" 
                                                        type="text" 
                                                        class="form-control" 
                                                        placeholder="Color" 
                                                        onKeyUp="this.value = this.value.toUpperCase();"
                                                        tabindex="6"
                                                        /></p>
                                          <p>  <input name="msc_problemas_medicos" 
                                                        type="text" 
                                                        class="form-control" 
                                                        placeholder="Problemas Médicos"  
                                                        onKeyUp="this.value = this.value.toUpperCase();"
                                                        tabindex="7"
                                                        /></p>
                                          <input name="msc_caracter" 
                                                    type="text" 
                                                    class="form-control" 
                                                    placeholder="Carácter" 
                                                    onKeyUp="this.value = this.value.toUpperCase();"
                                                    tabindex="8"
                                                     />
                                         </div>
                                        

                                    </div>

                                     <button type="submit" class="btn btn-primary btn-raised pull-right" name="guardar" tabindex="9">Guardar</button>
                                     <button type="reset" class="btn btn-default btn-raised pull-right" name="Limpiar">Limpiar</button>
                                </div><!-- Fin inputs mascota -->
                           
                        </form> <!-- Fin form_ficha_mascota -->
                    </div>
                </div><!-- Fin modal-body -->
            </div><!-- Fin modal_content -->
        </div><!-- Fin modal_dialog -->
    </div><!--Fin modal  fade-->
