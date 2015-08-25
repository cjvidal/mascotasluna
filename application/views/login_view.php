<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Acceso Agenda Mascotas Luna</title>
     <!--link the bootstrap css file-->
     <link href="<?= base_url()?>/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Material Design for Bootstrap -->
    <link href="<?= base_url()?>/bower_components/bootstrap-material-design/dist/css/material-wfont.min.css" rel="stylesheet">
    <link href="<?= base_url()?>/bower_components/bootstrap-material-design/dist/css/ripples.min.css" rel="stylesheet">
    <!-- Dropdown.js -->
    <link href="<?= base_url()?>/jquery_dd_css/jquery.dropdown.css" rel="stylesheet">
     <style type="text/css">
     .colbox {
          margin-left: 0px;
          margin-right: 0px;
     }
     </style>

     <script src="<?= base_url()?>/css/bootstrap/js/bootstrap.js" type="text/javascript"></script>
</head>
<body>



<div class="container">
     <div class="row" >
          <div class="col-lg-6 col-lg-offset-3 well centered">
            <h1>Gestión MASCOTAS LUNA</h1>
            <hr/>
          <?php 
          $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
          echo form_open("login/index", $attributes);?>
          <fieldset>
               <legend>Login</legend>
               <div class="form-group">
               <div class="row colbox">
               <div class="col-lg-4 col-sm-4">
                    <label for="txt_username" class="control-label">Usuario</label>
               </div>
               <div class="col-lg-8 col-sm-8">
                    <input class="form-control" id="txt_username" name="txt_username" placeholder="Usuario" type="text" value="<?php echo set_value('txt_username'); ?>" />
                    <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
               </div>
               </div>
               </div>
               
               <div class="form-group">
               <div class="row colbox">
               <div class="col-lg-4 col-sm-4">
               <label for="txt_password" class="control-label">Password</label>
               </div>
               <div class="col-lg-8 col-sm-8">
                    <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
                    <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
               </div>
               </div>
               </div>
                              
               <div class="form-group">
               <div class="col-lg-12 col-sm-12 text-center">
                    <input id="btn_login" name="btn_login" type="submit" class="btn btn-success" value="Login" />
                    <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Limpiar" />
               </div>
               </div>
          </fieldset>
          <?php echo form_close(); ?>
          <?php echo $this->session->flashdata('msg'); ?>
          </div>
     </div>
</div>
     
<!--load jQuery library-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--load bootstrap.js-->
<script src="<?= base_url()?>/css/bootstrap/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery.js"></script>
          <script src="<?= base_url()?>/css/bootstrap/js/bootstrap.min.js"></script>
          <!--<script src="//localhost/~carlosvidalferrero/vMascotasLuna/appAgenda_v3/bower_components/jquery/jquery-1.10.2.min.js"></script>-->
          <script src="<?= base_url()?>/bower_components/bootstrap/bootstrap.min.js"></script>

          <script src="<?= base_url()?>/bower_components/bootstrap-material-design/dist/js/ripples.min.js"></script>
          <script src="<?= base_url()?>/bower_components/bootstrap-material-design/dist/js/material.min.js"></script>
                   
        <script src="<?= base_url()?>/bower_components/snackbar/snackbar.min.js"></script>


        <script src="<?= base_url()?>/bower_components/nouislider/jquery.nouislider.min.js"></script>
<script>
                 $(function() {
                          $.material.init();
                          $(".shor").noUiSlider({
                              start: 40,
                              connect: "lower",
                              range: {
                                  min: 0,
                                  max: 100
                              }
                          });

                          $(".svert").noUiSlider({
                              orientation: "vertical",
                              start: 40,
                              connect: "lower",
                              range: {
                                  min: 0,
                                  max: 100
                              }
                          });
                      });
        </script>
</body>
</html>