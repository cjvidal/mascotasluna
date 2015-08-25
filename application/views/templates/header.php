<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!$this->session->loginuser == TRUE){
      $this->load->view('error_login');
    }
    else{
?>

<!DOCTYPE html>
<html lang="es">
 <head>
    <meta charset="utf-8" />
    <title><?= $title ?> - Agenda Mascotas Luna</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Resumen del contenido de la página">
 		<meta name="author" content="Carlos Javier Vidal Ferrero">
<!-- Twitter Bootstrap --> 
     <link href="<?= base_url()?>bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
   
    <!-- Material Design for Bootstrap -->
    <link href="<?= base_url()?>/bower_components/bootstrap-material-design/dist/css/material-wfont.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url()?>bower_components/bootstrap-material-design/dist/css/ripples.min.css" rel="stylesheet" type="text/css">
    <!-- Dropdown.js -->
    <link href="<?= base_url()?>bower_components/jquery_dd_css/jquery.dropdown.css" rel="stylesheet" type="text/css">
    <!--<link href="http://localhost/~carlosvidalferrero/vMascotasLuna/appAgenda_v4/bower_components/jquery_dd_css/jquery.dropdown.css" rel="stylesheet" type="text/css">-->
   <link href="<?= base_url()?>css/tablas.css" rel="stylesheet">
   <!--<script src="<?PHP echo base_url()?>JS/modernizr-custom.js"></script>-->
      <!-- polyfiller file to detect and load polyfills -->
    <!--<script src="<?PHP echo base_url()?>JS/polyfiller.js"></script>-->

  <script language="JavaScript">
    function pregunta(){
       alert('HOLA desde pregunta')
        if (confirm('¿Estas seguro dar de baja esta mascota?')){
            document.form_baja_mascota.submit()
          }

    }
    function baja_servicio(){
        if (confirm('¿Estas seguro dar de baja el servicio?')){
            document.form_baja_servicio.submit()
          }
    }
      
      function pregunta_cambio_pro(){
        if (confirm('Está realizando un cambio de propietario de la mascota. 
          Al guardar se procederá a desvincular la mascota del anterior propietario.
          ¿Está usted seguro de realizar dicha opción?')){
            document.getElementById("form_cambio_pro").submit();

          }
    }
     webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
  </script> 



     
 </head>
  <body >
 
 
   <div class="container">
	   <div class="header">
        <div class="navbar navbar-default">
          <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse" tabindex="-1">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              
              <div class="collapse navbar-collapse navbar-ex1-collapse">
                  <span class="pull-left"><a class="navbar-brand" href="<?=base_url()?>home" tabindex="-1">Mostrar Plan de Trabajo</a></span>
              <!--<a data-toggle="modal" 
                            href="" 
                            data-backdrop="static"
                            data-keyboard="false"
                            class="btn btn-lg btn-success "
                         -->
                  <span class="pull-right"> <a href="<?=base_url()?>nuevo_cliente/ficha_alta_nuevo_cliente" class="btn btn-lg btn-success " tabindex="-1"><i class="mdi-action-search" tabindex="-1"></i> Nuevo Cliente</a> </span>
                  <span class="pull-right"><a href="<?=base_url()?>clientes" class="btn btn-lg btn-info " tabindex="-1"><i class="mdi-action-search" tabindex="-1"></i> Buscar</a></span>
              <!--<a href="<?=base_url()?>mascotas" class="btn btn-lg btn-info "><i class="mdi-action-search"></i> Mascotas</a>-->
          
           
          </div>


          </div>
           <span class="pull-right"> 
              <h1 ><a href="<?=base_url()?>mascotas/nueva_raza" tabindex="-1"><i class="mdi-action-extension"></i></a></h1>
            </span>
          <span class="pull-right"><h7>Hola <?php echo ucfirst($this->session->username) ;?>! &nbsp; </h7>
            
              <a  href="<?=base_url()?>logout"  class="btn btn-warning navbar-right" role="button" tabindex="-1">

                  <!--Cerrar Sesión -->
                    <h5><i class="mdi-action-settings-power" tabindex="-1"></i></h5>
              </a>
          
          </span>

        </div>
        <!--<h6> Has iniciado sesión como 
            <b><?php echo ucfirst($this->session->username);?></b>
        </h6>-->
          
      </div> 
      <?php }?>
