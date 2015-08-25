<?PHP


//Parametros FECHA Y HORA
        $this->load->helper('date');
        
        date_default_timezone_set("Europe/Madrid");
        $fecha =date('Y/m/d');

        $dia = substr($fecha, 0, 2);
        $mes   = substr($fecha, 3, 2);
        $ano = substr($fecha, -4);
        // fechal final realizada el cambio de formato a las fechas europeas
        $fecha = $dia . '-' . $mes . '-' . $ano; 
        
        $hora = date('H:i:s');
    

    if($servicios){?>


<?PHP
?>

<h3><u>Datos del Servicio</u> </h3>


<?PHP
        foreach ($servicios as $servicio): 

            ?>

		  
            <div class="row">
                <form action="<?PHP echo base_url()?>servicios/servicio_editar/" method="POST" id="form_ficha_servicio" name="form_ficha_servicio">
                        <div class="inputs">
                            <div class="col-md-12 col-lg-12">
                                <input name="id_mascota" type="hidden" value="<?PHP echo $servicio->serv_id_mascota; ?>"  />
                                <input name="id_servicio" type="hidden" value="<?PHP echo $servicio->id_servicio; ?>"  />
                                <div class="row">
                                    <div class="col-md-12 col-lg-2">
                                        <label>Fecha del Servicio</label>
                                    </div>
                                    <div class="col-md-12 col-lg-10">
                                        <input name="serv_fecha" value="<?PHP echo $servicio->serv_fecha; ?>" type="date" class="" placeholder="" required  />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-2">
                                        <label>Tipo de Corte</label>
                                    </div>
                                     <div class="col-md-12 col-lg-10">
                                            <div class="radio radio-success" required>
                                                <label><input type="radio" name="serv_corte" value="1" <?PHP if($servicio->serv_corte == 1) echo ' checked';?> >Máquina</label>
                                                <label><input type="radio" name="serv_corte" value="2" <?PHP if($servicio->serv_corte == 2 OR $servicio->serv_corte == '') echo ' checked';?> >Tijera</label>
                                                <label><input type="radio" name="serv_corte" value="3" <?PHP if($servicio->serv_corte == 3 OR $servicio->serv_corte == '') echo ' checked';?> >Striping</label>
                                                <label><input type="radio" name="serv_corte" value="4" <?PHP if($servicio->serv_corte == 4 OR $servicio->serv_corte == '') echo ' checked';?> >Grooming</label>
                                            </div> 
                                    </div> 
                                </div> <!-- Fin Div Corte -->
                            
                                <div class="row">
                                    <div class="col-md-12 col-lg-2">
                                        <label>Número de Máquina</label>
                                    </div>
                                     <div class="col-md-12 col-lg-10">
                                         <input name="serv_acc1"                 value="<?PHP echo $servicio->serv_acc1; ?>" type="text" class="form-control" placeholder=""  />
                                     </div>
                                 </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-2">
                                        <label>Tiempo empleado</label>
                                    </div>
                                     <div class="col-md-12 col-lg-10">
                                         <input name="serv_acc2"                 value="<?PHP echo $servicio->serv_acc2; ?>" type="text" class="form-control" placeholder=""  />
                                    </div>
                                 </div>

                                  
                               
                                <input name="serv_acc3"                 value="<?PHP echo $servicio->serv_acc3; ?>" type="hidden" class="form-control" placeholder="" />
                                <input name="serv_acc4"                 value="<?PHP echo $servicio->serv_acc4; ?>" type="hidden" class="form-control" placeholder=" " />
                                

                                <div class="row">
                                    <div class="col-md-12 col-lg-2">
                                        <label>Observaciones</label>
                                    </div>
                                     <div class="col-md-12 col-lg-10">   
                                        <input name="serv_observaciones"        value="<?PHP echo $servicio->serv_observaciones; ?>" type="text" class="form-control" placeholder=" "  />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-2">
                                        <label>Observaciones Privadas</label>
                                    </div>
                                     <div class="col-md-12 col-lg-10">   
                                        <input name="serv_observ_priv"          value="<?PHP echo $servicio->serv_observ_priv; ?>" type="text" class="form-control" placeholder=""  />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-2">
                                        <label>Problemas Médicos</label>
                                    </div>
                                     <div class="col-md-12 col-lg-10">   
                                        <input name="serv_problemas_medicos"    value="<?PHP echo $servicio->serv_problemas_medicos; ?>" type="text" class="form-control" placeholder=""  />
                                    </dvi>
                                </div>
                            </div>
                            

                             <button type="submit" class="btn btn-primary btn-raised pull-right" name="guardar"><h2><i class="mdi-content-save"></i></h2> Guardar Datos Servicio</button>
                            

                        
                             
                        </div><!-- Fin inputs mascota -->
                   
                </form> <!-- Fin form_ficha_mascota -->
            </div>
		        <form action="<?PHP echo base_url()?>servicios/dameServicioBaja/" method="POST" id="form_baja_servicio" name="form_baja_servicio">          
                    <input name="id_mascota" type="hidden" value="<?PHP echo $servicio->serv_id_mascota; ?>"  />
                    <input name="id_servicio" type="hidden" value="<?PHP echo $servicio->id_servicio; ?>"  />
                    <input type="button"  onclick=" if (confirm('¿Estas seguro dar de baja el servicio?')){
            document.form_baja_servicio.submit()
          }" value="Eliminar Servicio"  class="btn btn-primary btn-danger pull-right"></input>        
                </form>




        <?PHP endforeach;

            ?>



    <?PHP
    }else{
        echo "<p> Error en la aplicación, no se han encontrado servicios realacionados con la mascota </p>";
    }


?>





