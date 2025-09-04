            <div class="breadcrumb-title pe-3">Mapeo</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                <li  class="breadcrumb-item active" aria-current="page"> EVENTO</li>
				<SPAN style="color:<?php echo $COLOR;?>font-size:20px;">&nbsp;&nbsp;&nbsp;&nbsp;STATUS&nbsp;:&nbsp;<?php echo  isset($STATUS_EVENTO)?$STATUS_EVENTO:'';
				
	$dias = array("DOMINGO","LUNES","MARTES","MIÉRCOLES","JUEVES","VIERNES","SÁBADO");
	$meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");
	$ymd=date("Y-m-d");
	//$ymd="2024-12-20";
	
	
	/*
	$CIERRE_TOTAL  , $FECHA_FINAL_EVENTO
	*/
	
	$CIERRE_TOTAL11 = '';
	
	
	if($CIERRE_TOTAL==''){
		$CIERRE_TOTAL11= strtotime('+30 day', strtotime($FECHA_FINAL_EVENTO));
	}else{
		$CIERRE_TOTAL11= strtotime('+1 day',  strtotime($CIERRE_TOTAL));	
	}
	
	$nuevafecha2 = date ( 'Y-m-d' , $CIERRE_TOTAL11 );
	$var_bloquea_fecha = '';
	if( strtotime($ymd) <= strtotime($nuevafecha2)){
		$var_bloquea_fecha = 'no';
		$totaldias = round((strtotime($nuevafecha2)-strtotime($ymd))/86400);
		echo ", QUEDAN: ".$totaldias. ' DÍAS PARA EL CIERRE DE ESTE EVENTO, SE CERRARÁ EL DÍA  
		'.$dias[date('w',strtotime($nuevafecha2))].' '.date('d',strtotime($nuevafecha2)). ' DE '.$meses[date('n',strtotime($nuevafecha2))-1] .' DE '.date('Y',strtotime($nuevafecha2));
	}else{
		$var_bloquea_fecha = 'si'; 
		echo ', EVENTO CERRADO, SE CERRÓ EL DÍA 
		'.$dias[date('w',strtotime($nuevafecha2))].' '.date('d',strtotime($nuevafecha2)). ' DE '.$meses[date('n',strtotime($nuevafecha2))-1] .' DE '.date('Y',strtotime($nuevafecha2));	
   if($conexion->variablespermisos('','Abrir_cierre','ver')=='si'){
		$var_bloquea_fecha = 'no';
		}
	}

	?>
	
	
	</SPAN>
                </ol>
              </nav>
            </div>
            <div class="ms-auto">
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">Settings</button>
                <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                  <a class="dropdown-item" href="javascript:;">Another action</a>
                  <a class="dropdown-item" href="javascript:;">Something else here</a>
                  <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
              </div>
            </div>