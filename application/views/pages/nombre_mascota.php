<?PHP

	if($mascotas_nombre){?>

	<?PHP
		foreach ($mascotas_nombre as $msc): ?>
		
		
						<a href="<?PHP echo base_url()?>mascotas/dameMascotaEditar/<?PHP echo $msc->id_mascota; ?>" class="btn"> <h2><b><i><?PHP echo $msc->msc_nombre; ?></b></i></h2></a>

						  <?PHP endforeach;

            ?>



    <?PHP
    }else{
        echo "<p> Error en la aplicación, no se han encontrado servicios realacionados con la mascota </p>";
    }


?>

