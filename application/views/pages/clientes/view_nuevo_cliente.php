<div class="row"><!-- Row para form del cliente -->

    <form action="<?PHP echo base_url()?>mascota_cliente/mascota_cliente_alta" method="POST" name="form_ficha_cliente" >
        <div id="caja_cliente" class="col-lg-10 col-md-10">

            <div class="inputs">

                <div class="col-xs-12 col-md-12 col-lg-12">
                    <h2>Datos del Cliente</h2>
                    <!--<input name="cli_dni" type="text" class="form-control" placeholder="DNI" auto-complete="ON" autofocus="true" required />-->
                    <input name="cli_nombre" 
                            type="text" class="form-control" 
                            placeholder="Nombre"
                            onKeyUp="this.value = this.value.toUpperCase();" 
                            auto-complete="ON" autofocus="true" required tabindex="1" />
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-lg-6">
                            <input name="cli_apellido1" 
                                    type="text" class="form-control" 
                                    placeholder="Apellido1"
                                    onKeyUp="this.value = this.value.toUpperCase();"
                                    auto-complete="ON" tabindex="2" required/>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-6">
                            <input name="cli_apellido2" 
                                    type="text" class="form-control" 
                                    placeholder="Apellido2" 
                                    onKeyUp="this.value = this.value.toUpperCase();"
                                    auto-complete="ON" tabindex="3"/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-lg-6">
                            <textarea name="cli_direccion" 
                                        type="text" class="form-control" 
                                        placeholder="Dirección" 
                                        onKeyUp="this.value = this.value.toUpperCase();"
                                        tabindex="4" ></textarea>
                        </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-3">
                                    <input name="cli_poblacion" 
                                            type="text" class="form-control" 
                                            onKeyUp="this.value = this.value.toUpperCase();"
                                            placeholder="Población" auto-complete="ON" tabindex="5" />
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
                            <input name="cli_obs_tel1" type="text"
                                    class="form-control" 
                                    placeholder="Observaciones Teléfono 1" 
                                    onKeyUp="this.value = this.value.toUpperCase();"
                                    tabindex="8" />
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
                            <input name="cli_obs_tel2" 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="Observaciones Teléfono 2" 
                                    onKeyUp="this.value = this.value.toUpperCase();"
                                    tabindex="10"/>
                        </div>
                    </div>
              
                    <input name="cli_conocio" 
                            type="text" 
                            class="form-control" 
                            placeholder="¿Cómo nos conoció?" 
                            onKeyUp="this.value = this.value.toUpperCase();"
                            tabindex="11"  />
                    <input name="cli_email" type="hidden" class="form-control" placeholder="EMAIL" tabindex="12"  />
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
                                    type="text" class="form-control" 
                                    placeholder="Teléfono segundo contacto" 
                                    pattern="[0-9]{9}"  
                                    maxlength="9" 
                                    tabindex="14"
                                     />    
                        </div>
                        <div class="col-xs-9 col-md-9 col-lg-9">
                            <input name="cli_contacto2" 
                                    type="text" class="form-control" 
                                    placeholder="Nombre segundo contacto" 
                                    onKeyUp="this.value = this.value.toUpperCase();"
                                    tabindex="15" />
                        </div>
                
                    


                    <div class="inputs">
                    <div class="col-md-10 col-lg-10">
                        <h2>Datos de la Mascota</h2>
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-lg-12">
                                <input name="msc_nombre" type="text" 
                                        class="form-control" placeholder="Nombre" 
                                        onKeyUp="this.value = this.value.toUpperCase();"
                                        required tabindex="16"  />
                            </div>
                            <div class="col-xs-4 col-md-4 col-lg-4">
                                <div class="sexo">
                                        <div class="radio radio-success" required tabindex="17">
                                            <label><input type="radio" name="msc_sexo" value="1" checked>Macho</label>
                                            <label><input type="radio" name="msc_sexo" value="2">Hembra</label>
                                        </div>  
                                </div> <!-- Fin Div Sexo -->
                            </div>
                            <div class="col-xs-4 col-md-4 col-lg-12">
                               
                            </div>
                            
                        </div>
                        <div class="col-xs-4 col-md-4 col-lg-6">
                                 <!--<input name="msc_raza" type="text" class="form-control" placeholder="Raza" tabindex="19" />-->
                                <div class="col-xs-4 col-md-4 col-lg-2">
                                        <label for="select" class=" control-label">Raza</label>
                                </div>
                                <div class="col-xs-4 col-md-4 col-lg-6">
                                     <select name="msc_raza" class="" tabindex="18">
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
                        <div class="col-xs-4 col-md-4 col-lg-6">
                              
                                    <div class="col-xs-4 col-md-4 col-lg-2">
                                        <label for="select" class=" control-label">Medida</label>
                                    </div>
                                    <div class="col-xs-4 col-md-4 col-lg-6">
                                        <select name="msc_medida" class="" id="select" tabindex="19">
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
                                <input name="msc_raza_obs" 
                                class="form-control" 
                                type="text" placeholder="Observaciones RAZA" tabindex="20"
                                 onKeyUp="this.value = this.value.toUpperCase();"
                                />
                            </div>
                        </div>
                         <br/><br/>
                        <div class="row">
                             <div class="col-xs-2 col-md-2 col-lg-6">
                                    <input name="msc_fecha_nac" type="text"   placeholder="Fecha Nacimiento" tabindex="21" />
                            
                            </div>
                            <div class="col-xs-4 col-md-4 col-lg-6">
                                <input name="msc_color" type="text" 
                                        class="form-control" 
                                        placeholder="Color" 
                                        onKeyUp="this.value = this.value.toUpperCase();"
                                        tabindex="22" />
                            </div>
                           
                            
                        </div>
                        <div class="row">
                            <br/>
                            
                            
                        </div>
                        
                        
                        <input name="msc_problemas_medicos" type="text" 
                                class="red_medico form-control" 
                                placeholder="Problemas Médicos" 
                                onKeyUp="this.value = this.value.toUpperCase();"
                                tabindex="23"  />
                        <input name="msc_caracter" type="text" 
                                class="form-control" 
                                placeholder="Carácter"  
                                onKeyUp="this.value = this.value.toUpperCase();"
                                tabindex="24"/>
                    </div>

                    </div><!-- Fin inputs mascota -->
                </div>     
                <button type="submit" class="btn btn-primary btn-raised pull-right" name="guardar" tabindex="24">Guardar</button>
                <button type="reset" class="btn btn-default btn-raised pull-right" name="Limpiar" tabindex="25">Limpiar</button>
            </div><!--Fin div inputs Propietario-->
        </div> <!-- Fin caja_propietario -->

        </div><!-- Fin div row propietario -->
    </form>
</div><!-- Fin row para cliente-->