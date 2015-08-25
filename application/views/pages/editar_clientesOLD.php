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
            <div id="caja_cliente" class="col-lg-12 col-md-12">
                <div class="inputs">
                    <div class="col-md-12 col-lg-12">
                        <!--<input name="cli_dni" type="text" class="form-control" placeholder="DNI" auto-complete="ON" autofocus="true" required />-->
                        <input name="id_cliente" type="hidden" value="<?PHP echo $cliente->id_cliente; ?>"  />
                        
                        <input name="cli_nombre" value="<?PHP echo $cliente->cli_nombre; ?>" type="text" class="form-control" placeholder="Nombre" auto-complete="ON" autofocus="true"  required />
                         <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <input name="cli_apellido1" value="<?PHP echo $cliente->cli_apellido1; ?>" type="text" class="form-control" placeholder="Apellido1" auto-complete="ON" />
                            </div>
                             <div class="col-xs-12 col-md-6 col-lg-6">
                                <input name="cli_apellido2" value="<?PHP echo $cliente->cli_apellido2; ?>" type="text" class="form-control" placeholder="Apellido2" auto-complete="ON" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6">
                                <textarea name="cli_direccion" value="<?PHP echo $cliente->cli_direccion; ?>" type="text" class="form-control" placeholder="Dirección "  ><?PHP echo $cliente->cli_direccion; ?></textarea>
                            </div>

                             <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-3">
                                    <input  name="cli_poblacion" 
                                            value="<?PHP echo $cliente->cli_poblacion; ?>" 
                                            type="text" class="form-control" 
                                            placeholder="Población" 
                                            auto-complete="ON" />
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
                    </div>
                
                    <div class="col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-xs-3 col-md-3 col-lg-3">
                                <input  name="cli_telefono1" 
                                        value="<?PHP echo $cliente->cli_telefono1; ?>" 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Teléfono 1"
                                        pattern="[0-9]{9}" 
                                        maxlength="9" 
                                        
                                        tabindex="7"
                                        required 

                                        />
                            </div>
                            <div class="col-xs-9 col-md-9 col-lg-9">
                                <input name="cli_obs_tel1" value="<?PHP echo $cliente->cli_obs_tel1; ?>" type="text" class="form-control" placeholder="Observaciones Teléfono 1" />
                            </div>
                            
                            <div class="col-xs-3 col-md-3 col-lg-3">
                                <input name="cli_telefono2" value="<?PHP echo $cliente->cli_telefono2; ?>" type="text" class="form-control" placeholder="Teléfono 2" />
                                </div>
                            <div class="col-xs-9 col-md-9 col-lg-9">
                                <input name="cli_obs_tel2" value="<?PHP echo $cliente->cli_obs_tel2; ?>" type="text" class="form-control" placeholder="Teléfono 1" />
                             </div>
                            <div class="col-xs-5 col-md-5 col-lg-5">
                                    <input name="cli_conocio" value="<?PHP echo $cliente->cli_conocio; ?>" type="text" class="form-control" placeholder="¿Cómo nos conoció?"  />
                                    
                                </div>
                                <div class="col-xs-5 col-md-5 col-lg-5">
                                <input name="cli_email" value="<?PHP echo $cliente->cli_email; ?>" type="text" class="form-control" placeholder="EMAIL"  />
                            </div>
                        <div class="radio radio-success">
                            <label>Firma Ley de Protección de Datos</label>
                            <label><input type="radio" name="cli_lpd" value="1"  <?PHP if($cliente->cli_lpd == 1) echo ' checked';?> > Sí </label>
                            <label><input type="radio" name="cli_lpd" value="2" <?PHP if($cliente->cli_lpd == 2 OR $cliente->cli_lpd == '') echo ' checked';?> > No  </label>
                        </div>
                      <div class="col-xs-9 col-md-9 col-lg-9">   
                         <input name="cli_contacto2" value="<?PHP echo $cliente->cli_contacto2; ?>" type="text" class="form-control" placeholder="Nombre segundo contacto"  />
                         <input name="cli_telefono_contacto2" value="<?PHP echo $cliente->cli_telefono_contacto2; ?>" type="tel" class="form-control" placeholder="Teléfono segundo contacto"  />
                       </div>   
                    </div>     
                    <button type="submit" class="btn btn-primary btn-raised pull-left" name="guardar"> <h2><i class="mdi-content-save"></i></h2> Guardar cambios del CLIENTE</button>
                    <!--<button type="reset" class="btn btn-default btn-raised pull-left" name="Limpiar">Limpiar</button>-->
                    <div id="muestraMascotas">
                        <div class="row pull-right">
                            <div class="col-lg-6 col-md-6 ">
                                <a href="<?PHP echo base_url()?>mascota_cliente/buscar_msc_add/<?PHP echo $cliente->id_cliente; ?>" class="btn btn-sm btn-info  "
                                data-backdrop="static"
                                data-keyboard="true"
                                data-toggle="modal"
                                data-target=""> <h2><i class="mdi-action-search"></i></h2> Buscar Mascota para añadir</a>
                            </div>
                            
                        </div>
                    </div> <!-- Fin div MuestraMascotas -->
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
                </div><!--Fin div inputs Propietario-->
            </div> <!-- Fin caja_propietario -->
        </form>
    </div><!-- Fin div row propietario -->

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
                           aria-hidden="true">×
                        </button>
                        <h2 class="modal-title " id="myModalLabelMascota">
                           Datos de la Mascota
                        </h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="<?PHP echo base_url()?>mascota_cliente/add_mascota_a_cliente" method="POST" name="form_ficha_mascota">
                                <div class="inputs">
                                    <div class="col-md-12 col-lg-12">
                                        <input name="id_cliente" type="hidden" value="<?PHP echo $id_cliente; ?>"  />
                                        <input name="msc_nombre" type="text" class="form-control" placeholder="Nombre" required  />
                                        
                                        <div class="sexo">
                                                <div class="radio radio-success" >
                                                    <label><input type="radio" name="msc_sexo" id="msc_sexo"  value="1" checked  >Macho</label>
                                                    <label><input type="radio" name="msc_sexo"  value="2" >Hembra</label>
                                                </div>  
                                        </div> <!-- Fin Div Sexo -->
                                    
                                        <input name="msc_raza" type="text" class="form-control" placeholder="Raza"  />
                                        <input name="msc_medida" type="text" class="form-control" placeholder="Medida"  />
                                        <input name="msc_color" type="text" class="form-control" placeholder="Color" />
                                        <input name="msc_fecha_nac" type="text" class="form-control" placeholder="Fecha Nacimiento" />
                                        <input name="msc_problemas_medicos" type="text" class="form-control" placeholder="Problemas Médicos"  />
                                        <input name="msc_caracter" type="hidden" class="form-control" placeholder="Carácter"  />
                                    </div>

                                     <button type="submit" class="btn btn-primary btn-raised pull-right" name="guardar">Guardar</button>
                                     <button type="reset" class="btn btn-default btn-raised pull-right" name="Limpiar">Limpiar</button>
                                </div><!-- Fin inputs mascota -->
                           
                        </form> <!-- Fin form_ficha_mascota -->
                    </div>
                </div><!-- Fin modal-body -->
            </div><!-- Fin modal_content -->
        </div><!-- Fin modal_dialog -->
    </div><!--Fin modal  fade-->
