<nav class="navbar navbar-expand gap-3 w-100">

  <div class="mobile-menu-button">
    <ion-icon name="menu-sharp"></ion-icon>
  </div>

  <div id="content" class="flex-grow-1">
    <?php
    $prefijo = substr($NUMERO_EVENTO,0,2);
    if($prefijo=='EV'){
        $COLOR="#1371f0;";
    } elseif($prefijo=='EP'){
        $COLOR="#b52347;";
    } elseif($prefijo=='IN'){
        $COLOR="#23b528;";
    } elseif($prefijo=='FI'){
        $COLOR="#c028be;";
    }
    ?>
<style>
  .responsive-text-lg {
    font-size: clamp(10px, 1.6vw, 18px);
    line-height: 1.3;
    white-space: normal;
    overflow-wrap: anywhere;
  }

  .responsive-text-sm {
    font-size: clamp(9px, 1.4vw, 15px);
    line-height: 1.3;
    white-space: normal;
    overflow-wrap: anywhere;
  }

  .event-meta {
    max-width: 100%;
    display: inline-flex;
    flex-wrap: wrap;
    gap: 0.35rem;
  }

  .status-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    line-height: 1.25;
    text-align: center;
    white-space: normal;
  }
</style>
    <!-- Fila 1: mostrar/contraer + nombre / número + badge STATUS a la derecha -->
    <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-2">
      <div>
 <strong>
          <span class="text-uppercase responsive-text-lg event-meta" style="color:<?php echo $COLOR; ?>">
          
            NOMBRE:&nbsp;
            <?php echo isset($NOMBRE_CORTO_EVENTO) ? $NOMBRE_CORTO_EVENTO : ''; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            NÚMERO:&nbsp;
            <?php echo isset($NUMERO_EVENTO) ? $NUMERO_EVENTO : ''; ?>
          </span>
        </strong>
      </div>

      <div class="text-md-end">
        <span class="status-badge" style="background:<?php echo $COLOR; ?>color:#ffffff;">
          STATUS:&nbsp;<?php echo isset($STATUS_EVENTO) ? $STATUS_EVENTO : ''; ?>
        </span>
      </div>
    </div>

    <!-- Fila 2: mensaje de días para el cierre o evento cerrado -->
    <div class="mt-1">
      <strong>
        <span class="responsive-text-sm" style="color:<?php echo $COLOR; ?>">
          <?php
          $dias  = array("DOMINGO","LUNES","MARTES","MIÉRCOLES","JUEVES","VIERNES","SÁBADO");
          $meses = array("ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE");

          $ymd = date("Y-m-d");
          // $ymd = "2024-12-20";

          /*
          $CIERRE_TOTAL  , $FECHA_FINAL_EVENTO
          */

          $CIERRE_TOTAL11 = '';

          if($CIERRE_TOTAL==''){
            $CIERRE_TOTAL11 = strtotime('+100 day', strtotime($FECHA_FINAL_EVENTO));
          } else {
            $CIERRE_TOTAL11 = strtotime('+1 day', strtotime($CIERRE_TOTAL)); 
          }

          $nuevafecha2 = date('Y-m-d', $CIERRE_TOTAL11);
          $var_bloquea_fecha = '';

          if(strtotime($ymd) <= strtotime($nuevafecha2)){
            $var_bloquea_fecha = 'no';
            $totaldias = round((strtotime($nuevafecha2) - strtotime($ymd))/86400);
            echo 'QUEDAN:&nbsp;'.$totaldias.
                 '&nbsp;DÍAS PARA EL CIERRE DE ESTE EVENTO. &nbsp;&nbsp;SE CERRARÁ EL DÍA '.
                 $dias[date('w',strtotime($nuevafecha2))].' '.
                 date('d',strtotime($nuevafecha2)).' DE '.
                 $meses[date('n',strtotime($nuevafecha2))-1].' DE '.
                 date('Y',strtotime($nuevafecha2));
          } else {
            $var_bloquea_fecha = 'si';
            echo 'EVENTO CERRADO.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SE CERRÓ EL DÍA '.
                 $dias[date('w',strtotime($nuevafecha2))].' '.
                 date('d',strtotime($nuevafecha2)).' DE '.
                 $meses[date('n',strtotime($nuevafecha2))-1].' DE '.
                 date('Y',strtotime($nuevafecha2));

            if($conexion->variablespermisos('','Abrir_cierre','ver')=='si'){
              $var_bloquea_fecha = 'no';
            }
          }
          ?>
        </span>
      </strong>
    </div>
  </div>

  <!-- Parte derecha: iconos, usuario, foto, salir -->
  <div class="top-navbar-right ms-auto">
    <ul class="navbar-nav align-items-center">
      <li class="nav-item mobile-search-button">
        <a class="nav-link" href="javascript:;">
         

      <li class="nav-item dropdown dropdown-large">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
          <div class="position-relative">
            <span class="notify-badge">0</span>
            <ion-icon name="notifications-sharp"></ion-icon>
          </div>
        </a>

        <div class="dropdown-menu dropdown-menu-end">
          <a href="javascript:;">
            <div class="msg-header">
              <p class="msg-header-title">SIN NOTIFICACIONES</p>
            </div>
          </a>
          <div class="header-notifications-list">
            <a class="dropdown-item" href="javascript:;">
              <div class="d-flex align-items-center">
                <!-- contenido notificaciones -->
              </div>
            </a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <div class="mode-icon">
          <h6 class="mb-0 dropdown-user-name"><?php echo $_SESSION["NOMBREUSUARIO"]; ?></h6>
        </div>
      </li>

      <li class="nav-item dropdown dropdown-user-setting">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
          <div class="user-setting">
            <img src="<?php echo 'includes/archivos/'.$_SESSION["F_FOTO_ACTUAL"]; ?>" class="user-img" alt="">
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex flex-row align-items-center gap-2">
                <img src="<?php echo 'includes/archivos/'.$_SESSION["F_FOTO_ACTUAL"]; ?>" alt="" class="rounded-circle" width="54" height="54">
                <div>
                  <h6 class="mb-0 dropdown-user-name"><?php echo $_SESSION["NOMBREUSUARIO"]; ?></h6>
                </div>
              </div>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>
          <li>
            <a class="dropdown-item" href="index.php?salir=1">
              <div class="d-flex align-items-center">
                <div><ion-icon name="log-out-outline"></ion-icon></div>
                <div class="ms-3"><span>SALIR</span></div>
              </div>
            </a>
          </li>
        </ul>
      </li>

    </ul>
  </div>
</nav>
