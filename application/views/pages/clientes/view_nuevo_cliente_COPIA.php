                            <div class="row"><!-- Row para form del cliente -->

                                <form action="<?PHP echo base_url()?>mascota_cliente/mascota_cliente_alta" method="POST" name="form_ficha_cliente" >
                                    <div id="caja_cliente" class="col-lg-10 col-md-10">

                                        <div class="inputs">

                                            <div class="col-md-12 col-lg-12">
                                                <h2>Datos del Cliente</h2>
                                                <!--<input name="cli_dni" type="text" class="form-control" placeholder="DNI" auto-complete="ON" autofocus="true" required />-->
                                                <input name="cli_nombre" type="text" class="form-control" placeholder="Nombre" auto-complete="ON" autofocus="true" required />
                                                <input name="cli_apellido1" type="text" class="form-control" placeholder="Apellido1" auto-complete="ON" />
                                                <input name="cli_apellido2" type="text" class="form-control" placeholder="Apellido2" auto-complete="ON" />
                                                <textarea name="cli_direccion" type="text" class="form-control" placeholder="Dirección"  ></textarea>
                                                
                                                <div class="col-md-8 col-lg-8">
                                                    <input name="cli_poblacion" type="text" class="form-control" placeholder="Población" auto-complete="ON" />
                                                </div>

                                                <div class="col-md-6 col-lg-6">

                                                    <input name="cli_cp" type="text" class="form-control" placeholder="CP" auto-complete="ON" />
                                                </div>

                                                
                                                    
                                                   
                                                </div>
                                                
                                            </div>
                                        
                                            
                                           <div class="col-md-12 col-lg-12">
                                                
                                                    <input name="cli_telefono1"  type="text" class="form-control" placeholder="Teléfono 1"required />
                                                    <input name="cli_obs_tel1" type="text" class="form-control" placeholder="Observaciones Teléfono 1" />
                                              
                                               
                                                    <input name="cli_telefono2" type="text" class="form-control" placeholder="Teléfono 2" />
                                                    <input name="cli_obs_tel2" type="text" class="form-control" placeholder="Observaciones Teléfono 2" />
                                          
                                                <input name="cli_conocio" type="text" class="form-control" placeholder="¿Cómo nos conoció?"  />
                                                <input name="cli_email" type="text" class="form-control" placeholder="EMAIL"  />
                                                <div class="radio radio-success">
                                                    <label>Firma Ley de Protección de Datos</label>
                                                    <label><input type="radio" name="cli_lpd" value="1"  >Sí</label>
                                                    <label><input checked type="radio" name="cli_lpd" value="2" >No</label>
                                                </div>
                                                
                                            <input name="cli_contacto2" type="text" class="form-control" placeholder="Nombre segundo contacto"  />
                                            <input name="cli_telefono_contacto2" type="tel" class="form-control" placeholder="Teléfono segundo contacto"  />
                                                <div class="inputs">
                                                <div class="col-md-10 col-lg-10">
                                                    <h2>Datos de la Mascota</h2>
                                                    <input name="msc_nombre" type="text" class="form-control" placeholder="Nombre" required  />
                                                    
                                                    <div class="sexo">
                                                            <div class="radio radio-success" required>
                                                                <label><input type="radio" name="msc_sexo" value="1" checked>Macho</label>
                                                                <label><input type="radio" name="msc_sexo" value="2">Hembra</label>
                                                            </div>  
                                                    </div> <!-- Fin Div Sexo -->
                                                
                                                    <input name="msc_raza" type="text" class="form-control" placeholder="Raza"  />
                                                    <input name="msc_medida" type="text" class="form-control" placeholder="Medida"  />
                                                    <input name="msc_color" type="text" class="form-control" placeholder="Color" />
                                                    <input name="msc_fecha_nac" type="date" class="form-control" placeholder="Fecha Nacimiento" />
                                                    <input name="msc_problemas_medicos" type="text" class="form-control" placeholder="Problemas Médicos"  />
                                                    <input name="msc_caracter" type="text" class="form-control" placeholder="Carácter"  />
                                                </div>

                                </div><!-- Fin inputs mascota -->
                                            </div>     
                                            <button type="submit" class="btn btn-primary btn-raised pull-right" name="guardar">Guardar</button>
                                            <button type="reset" class="btn btn-default btn-raised pull-right" name="Limpiar">Limpiar</button>
                                        </div><!--Fin div inputs Propietario-->
                                    </div> <!-- Fin caja_propietario -->
                                </form>
                            </div><!-- Fin div row propietario -->
                        </div><!-- Fin Modal Body propietario -->
                    </div><!-- Fin Modal Content propietario -->
                </div><!-- Fin Modal Dialog propietario -->
        </div><!-- Fin Modal fade propietario -->
    </div><!-- Fin row para cliente-->