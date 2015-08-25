<?PHP


    if (isset($razas)) { ?>

    
            </thead>
            <?PHP
        foreach ($razas as $raza): ?>
                             
            <h2 >
               Editando raza <b></b>
            </h2>
    
    
        <div class="row"><!-- Row para form del cliente -->
            <form action="<?PHP echo base_url()?>mascotas/editar_raza" method="POST" name="form_editar_razas" >
                <div id="caja_cliente" class="col-lg-12 col-md-12">
                    <div class="inputs">
                       
                             <input name="id_raza" type="hidden" class="form-control" value="<?PHP echo $raza->id_raza?>" auto-complete="ON" />
                            <input name="rz_nombre" 
                                    type="text" class="form-control"
                                    value="<?PHP echo $raza->rz_nombre?>" 
                                    onKeyUp="this.value = this.value.toUpperCase();"
                                    auto-complete="ON" />
                            <input name="rz_descripcion" 
                                    type="text" class="form-control" 
                                    value="<?PHP echo $raza->rz_descripcion?>"
                                    onKeyUp="this.value = this.value.toUpperCase();"
                                    auto-complete="ON" />
                    </div>
                    
        

                        <button type="submit" class="btn btn-primary btn-raised pull-right" name="guardar">Guardar</button>
                         <button type="reset" class="btn btn-default btn-raised pull-right" name="Limpiar">Limpiar</button>
                    </div>
                </div>
            </form>
                                          
<?PHP endforeach;

?>
 <?PHP
    }else{
        echo "<p> Error en la aplicación </p>";
    }


?>
                            <!-- Fin Dato Técnico -->