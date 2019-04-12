<?php 
include_once('template/header.php');
?>


<div class="row"><!--Inicio contenido-->
    <div class="col-xs-12"><!--col-->
      <center>
		<div id="accordion">
        <div class="card">
          <div class="card-header" style="background-color: rgb(142, 255, 166); color: #000000;">
            <a class="card-link" data-toggle="collapse" href="#collapseOne">
              <h3>Historia</h3>
            </a>
          </div>
          <div id="collapseOne" class="collapse show" data-parent="#accordion">
            <div class="card-body">
              <p>La empresa "The World Fantasy Frida" fue fundada en el año 2006 en Naucalpan de Juárez, México, por el señor Enrique Olvera Guerrero. 
                Actualmente, el negocio se encuentra en la ciudad de Parácuaro, Guanajuato.</p>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" style="background-color: rgb(142, 255, 166);  color: #000000;">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
              <h3 class="t1">Misión</h3>
            </a>
          </div>
          <div id="collapseTwo" class="collapse" data-parent="#accordion">
            <div class="card-body">
              <p class="p1"> Somos una organización que se dedica a la elaboración y venta de piñatas artesanales, teniendo como propósito principal
                satisfacer las necesidades de nuestros clientes.</p>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" style="background-color: rgb(142, 255, 166);  ">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
              <h3 class="t1">Visión</h3> 
            </a>
          </div>
          <div id="collapseThree" class="collapse" data-parent="#accordion">
            <div class="card-body">
              <p class="p1">Ser una empresa reconocida nacionalmente mediante la elaboración y venta de artesanías tradiciionales de México; así mismo, siendo
                compentes ante el comercio cultural.</p>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" style="background-color: rgb(142, 255, 166);  color: #000000;">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
              <h3 class="t1">Valores</h3>
            </a>
          </div>
          <div id="collapseFour" class="collapse" data-parent="#accordion">
            <div class="card-body">
              <h6>Respeto:</h6>
              <p class="p1">Cada empleado y clente resivirá un trato digno.</p>
              <h6>Responsabilidad:</h6>
              <p class="p1">Los trabajos srán entregados en tiempo y forma.</p>
              <h6>Tolerancia:</h6>
              <p class="p1">Se aceptarán opiniones sobre el producto ofrecido.</p>
            </div>
          </div>

          <div class="card-header" style="background-color: rgb(142, 255, 166);  color: #000000;">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseSix">
              <h3 class="t1">Video en español</h3>
            </a>
          </div>
          <div id="collapseSix" class="collapse" data-parent="#accordion">
            <div class="card-body">
              <video controls>
                 <source src="images/VideoTWFF.mp4" type="video/mp4">
            </video>
            </div>
          </div>

          <div class="card-header" style="background-color: rgb(142, 255, 166);  color: #000000;">
            <a class="collapsed card-link" data-toggle="collapse" href="#collapseFive">
              <h3 class="t1">Video en Inglés</h3>
            </a>
          </div>
          <div id="collapseFive" class="collapse" data-parent="#accordion">
            <div class="card-body">
              <video controls>
                 <source src="images/VideoTWFF2.mp4" type="video/mp4">
            </video>
            </div>
          </div>

        </div>
      </div>
      </center>
    </div>
      <br>
      <center></center>
  <script type="text/javascript" id="gwd-init-code">
    (function() {
      var gwdAd = document.getElementById('gwd-ad2');

      /**
       * Handles the DOMContentLoaded event. The DOMContentLoaded event is
       * fired when the document has been completely loaded and parsed.
       */
      function handleDomContentLoaded(event) {

      }

      /**
       * Handles the WebComponentsReady event. This event is fired when all
       * custom elements have been registered and upgraded.
       */
      function handleWebComponentsReady(event) {
        // Start the Ad lifecycle.
        setTimeout(function() {
          gwdAd.initAd();
        }, 0);
      }

      /**
       * Handles the event that is dispatched after the Ad has been
       * initialized and before the default page of the Ad is shown.
       */
      function handleAdInitialized(event) {}

      window.addEventListener('DOMContentLoaded',
        handleDomContentLoaded, false);
      window.addEventListener('WebComponentsReady',
        handleWebComponentsReady, false);
      window.addEventListener('adinitialized',
        handleAdInitialized, false);
    })();
  </script>
      <br>
  </div><!--Fin contenido -->
  <style>
        .edgeLoad-EDGE-23410471 { visibility:hidden; }
  </style>

    <div id="Stage" class="EDGE-23410471"> </div>
<?php  
include_once('template/footer.php');
?>