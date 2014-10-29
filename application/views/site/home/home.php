<div class="section section-1 active">
	<div class="sect-50">
		<div class="texto">
			<h1 id="titulo-1">La voz femenina</h1>
			<h1 id="titulo-2">de la Motivación</h1>
		</div>
		<div class="texto">
			<h4 id="texto-1">Escuchame de lunes a Viernes de 13 a 14 horas en</h4>
			<h4 id="texto-2">90.9 FM Mérida, Yucatán.</h4>
		</div>
		<div class="texto texto-footer">
			<h4 id="texto-3">Escucha el programa en Tiempo Real de 13 a 14 horas dando click <a href="">Aquí</a></h4>
		</div>
	</div>
</div>

<div class="section fondo about">
	<div class="container">
		<div class="row">
		    <div class="contenido">
			<div class="col-md-4 col-sm-6">
				<h2>MELY MARTINEZ</h2>
				<img src="assets/img/imagen-1.jpg">
				<h5>Coach, Conductora y Conferencista</h2>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet varius diam. Suspendisse nec varius lectus. Donec eget quam arcu. Ut neque eros, mollis quis vulputate suscipit, rutrum et urna. Vestibulum sodales tincidunt accumsan. Donec fermentum eu sem vel pellentesque. Aliquam varius viverra est, vulputate bibendum tortor pretium eget. Curabitur ultrices tortor et ante gravida sagittis. Aliquam erat volutpat. Maecenas bibendum commodo nibh vel blandit. In ligula nisl, pretium a semper sit amet, lobortis imperdiet felis. Proin condimentum aliquam libero rutrum venenatis. Fusce pellentesque mi in velit tincidunt, sed suscipit metus iaculis. Aenean egestas dui eu erat viverra, eget euismod lectus sodales. Sed faucibus varius risus in ultrices. Vivamus condimentum mauris ut sem suscipit ultricies.
				</p>
			</div>
			<div class="col-md-4 col-sm-6">
				<p>
					Sed rutrum faucibus eros, eu placerat nibh semper at. Duis tristique dolor sem. Proin hendrerit augue varius augue viverra cursus. Aenean id enim in lectus feugiat ultrices vitae gravida est. Curabitur nec lorem feugiat risus aliquet lacinia. 
				    <br><br>
					sagittis. Aliquam erat volutpat. Maecenas bibendum commodo nibh vel blandit. In ligula nisl, pretium a semper sit amet, lobortis imperdiet felis. Proin condimentum aliquam libero rutrum venenatis. Fusce pellentesque mi in velit tincidunt, sed suscipit metus iaculis. Aenean egestas dui eu erat viverra, eget euismod lectus sodales. Sed faucibus varius risus in ultrices. Vivamus condimentum mauris ut sem suscipit ultricies.
                    <br><br>
					Sed rutrum faucibus eros, eu placerat nibh semper at. Duis tristique dolor sem. Proin hendrerit augue varius augue viverra cursus. Aenean id enim in lectus feugiat ultrices vitae gravida est. Curabitur nec lorem feugiat risus aliquet lacinia. Nunc vitae fermentum risus. Fusce eget varius nisi, non fringilla lectus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet varius diam. Suspendisse nec varius lectus. Donec eget quam arcu. Ut ndum commodo nibh vel blandit. In ligula nisl, pretium a semper sit amet, lobortis imperdiet felis. Proin condimentum aliquam libero rutaucibus eros, eu placerat nibh semper at. Duis tristique dolor sem. Proin hendrerit augue vem feugiat risus aliquet lacinia. Nunc vitae fermentum risus. Fusce eget varius nisi, non fringilla lectus.
					Sed rutrum faucibus eros, eu placerat nibh semper at. Duis tristique dolor sem. Proin hgiat risus aliquet lacinia. Nun varius nisi, non fringilla lectus.
				</p>
			</div>
            <div class="col-md-4 col-sm-6 imagenes">
                <img class="img-responsive" src="assets/img/imagen-2.jpg">
                
                <img class="img-responsive" src="assets/img/imagen-3.jpg">
            </div>
            </div>
		</div>
	</div>
</div>

<div class="section fondo podcast" >
	<div class="container">
		<div class="row">
           <div class="contenido visible-md visible-lg col-md-10 col-sm-12 col-md-offset-1">
               <div class="soundcloud col-md-10  col-md-offset-1">
                  <?php
                require_once 'assets/Services/Soundcloud.php';

                // create a client object with your app credentials
                $client = new Services_Soundcloud('YOUR_CLIENT_ID', 'YOUR_CLIENT_SECRET');
                $client->setCurlOptions(array(CURLOPT_FOLLOWLOCATION => 1));

                // get a tracks oembed data
                $track_url = 'https://soundcloud.com/mely-mart-nez-1';
                $embed_info = json_decode($client->get('oembed', array('url' => $track_url)));

                // render the html for the player widget
                print $embed_info->html;
                ?>
               </div>
               
           </div>
        </div>		
	</div>
	<div class="container-fluid">
	    <div class="row">
	        <div class="fondo-podcast">
                <div class="abajo col-md-12 col-md-offset-1">
                    <div class="col-md-3">
                        <img src="../../../../assets/img/podcast/logo.png">
                    </div>
	                <div class="col-md-6">
	                    <div class="col-md-2">
	                        <h3>LUN.</h3>
	                        <h4>11AM</h4>
	                    </div>
                        <div class="col-md-2">
	                        <h3>MIER.</h3>
	                        <h4>11AM</h4>
	                    </div>
	                    <div class="col-md-2">
	                        <h3>JUE.</h3>
	                        <h4>11AM</h3>
	                    </div>
	                    <div class="col-md-2">
	                        <h3>VIER.</h3>
	                        <h4>11AM</h4>
	                    </div>
	                </div>
	                <div class="col-md-3 radio-link">
	                    <a>W RADIO 90.9 FM Mérida</a>
	                </div>
                </div>
	        </div>
	    </div>
	</div>
</div>

<div class="section fondo articulos"  >
	<div class="container-fluid">
		<div class="row">
           <div class="col-md-12 contenido">
               <div class="col-md-2 col-sm-4 col-xs-4 col-md-offset-1">
                   <img class="img-responsive" src="../../../../assets/img/articles/pareja.png">
                   <h3 >texto de ejemplo</h3>
                   <p class="visible-md visible-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                   </p>
                   <a href="#">Leer más artículos</a>
               </div>
               <div class="col-md-2 col-sm-4 col-xs-4">
                   <img class="img-responsive" src="../../../../assets/img/articles/mujer.png">
                   <h3 >texto de ejemplo</h3>
                   <p class="visible-md visible-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                   </p>
                   <a href="#">Leer más artículos</a>
               </div>
               <div class="col-md-2 col-sm-4 col-xs-4">
                   <img class="img-responsive" src="../../../../assets/img/articles/papas.png">
                   <h3 >texto de ejemplo</h3>
                   <p class="visible-md visible-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                   </p>
                   <a href="#">Leer más artículos</a>
               </div>
               <div class="col-md-2 col-sm-4 col-xs-4">
                   <img class="img-responsive" src="../../../../assets/img/articles/sabiduria.png">
                   <h3 >texto de ejemplo</h3>
                   <p class="visible-md visible-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                   </p>
                   <a href="#">Leer más artículos</a>
               </div>
               <div class="col-md-2 col-sm-4 col-xs-4">
                   <img class="img-responsive" src="../../../../assets/img/articles/solteros.png">
                   <h3 >texto de ejemplo</h3>
                   <p class="visible-md visible-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                   </p>
                   <a href="#">Leer más artículos</a>
               </div>
           </div>
        </div>		
	</div>
</div>

<div class="section fondo conferencias" >
    <div class="container">
       <div class="row">
           <div class="slider contenido col-md-12">
               <ul class="slider-conferencias">
                <li><img class="img-responsive" src="../../../../assets/img/banner1.png"/></li>
                <li><img class="img-responsive" src="../../../../assets/img/banner1.png" /></li>
                </ul>
           </div>
       </div>
       <div class="row">
           <div class="col-md-12">
                <h3>MTY. <span class="azul">ENERO 2013</span></h3>
            </div>
            <div class="col-md-5">   
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet varius diam. Suspendisse nec varius lectus. Donec eget quam arcu. Ut neque eros, mollis quis vulputate suscipit, rutrum et urna. Vestibulum sodales tincidunt accumsan. Donec fermentum eu sem vel pellentesque. Aliquam varius viverra est, vulputate bibendum tortor pretium eget. Curabitur ultrices tortor et ante gravida sagittis. Aliquam erat volutpat. Maecenas bibendum commodo nibh vel blandit. In ligula nisl, pretium a semper sit amet, lobortis imperdiet felis. Proin condimentum aliquam libero rutrum venenatis. Fusce pellentesque mi in velit tincidunt, sed suscipit metus iaculis. Aenean egestas dui eu erat viverra, eget euismod lectus sodales. Sed faucibus varius risus in ultrices. Vivamus condimentum mauris ut sem suscipit ultricies.<br><br>

Sed rutrum faucibus eros, eu placerat nibh semper at. Duis tristique dolor sem. Proin hendrerit augue varius augue viverra cursus. Aenean id enim in lectus feugiat ultrices vitae gravida est. Curabitur nec lorem feugiat risus aliquet lacinia. Nunc vitae fermentum risus. Fusce eget varius nisi, non fringilla lectus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet varius diam. </p>
               
               
           </div>
           <div class="col-md-7 col-sm-12">
                   <img class="img-responsive" src="../../../../assets/img/conferencias/conferencia1.png">
            </div>
            <div class="abajo col-md-12">
                <p>Agradecimientos especiales a: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet varius diam. Suspendisse nec varius lectus. </p>
            </div>
       </div>
    </div>		
</div>

<!--
<div class="section fondo galeria" >
	<div class="container">
		<div class="row">
        </div>		
	</div>
</div>
-->

<div class="section fondo socio" >
	<div class="container">
		<div class="row">
           <div class="contenido col-md-7 col-lg-6 col-sm-12 col-md-offset-3">
                <h1>¡Sé mi Socio!</h1>
                <h3>Obtén tu Número de Socio</h3>
                <p>Al ser mi socio podrás obtener la Melycard (próximo lanzamiento) Que te dará descuentos en múltiples establecimientos Y podrás Recibir noticias, promociones e invitaciones.</p>
                
                    <form class="form-horizontal" method="post" action="email/contacto" role="form">
                        <div class="form-group">
                            <div class="col-md-12">
                              <input type="text" class="form-control" name="nombre" required  placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                              <input type="email" class="form-control" name="correo" required placeholder="Correo Electronico">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-xs-12 col-sm-12">
                              <input type="number" class="form-control" name="edad" required placeholder="Edad">
                            </div>
                            <div class="col-md-6 col-xs-12 col-sm-12">
                              <input type="text" class="form-control" name="codigo_postal" required placeholder="Código Postal">
                            </div>
                        </div>
                        <div class="col-md-7 col-md-offset-2"><button type="submit" class="btn btn-default btn-lg btn-block">Enviar</button></div>
                    </form>
           </div>
        </div>		
	</div>
	
</div>

<div class="section fondo contacto" >
	<div class="container">
		<div class="row">
           <div class="contenido col-md-5 col-md-offset-3">
               
               <p class="text-center"><i class="fa fa-quote-left fa-2x pull-left"></i>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Vivamus sit amet varius diam. Suspendisse nec varius lectus. Donec eget quam arcu. Ut neque eros, mollis quis vulputate.<i class="fa fa-quote-right fa-2x pull-right"></i>
               </p>
               <div class="col-md-offset-5"><a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-text="Lorem ipsum dolor sit amet, consectetur adipiscing elit.Vivamus sit amet varius diam. Suspendisse nec varius lectus. Donec eget quam arcu. Ut neque eros, mollis quis vulputate."><span>TWITTER</span></a></div>
           </div> 
        </div>		
	</div>
    <div class="container-fluid footer">
        <div class="row">
            <div class="linea"></div>
            <div class="fondo-footer col-md-12 col-sm-12">
               <div class="col-md-offset-1 col-md-2 col-sm-3">
                    <img  src="../../../../assets/img/contacto/logo1.png">
                    <img  src="../../../../assets/img/contacto/logo2.png">
               </div>
               <div class="col-md-9 col-sm-9 info-contacto">
                   <div class="col-md-3 col-sm-4">
                       <span>Teléfonos</span>
                       <div class="divide"></div>
                       <p>
                           Isabel Loeza <br> Coordinadora de invitados <br>
                           9993.31.50.16
                       </p>
                   </div>
                   <div class="col-md-3 col-sm-4">
                       <span>Contacto</span>
                       <div class="divide"></div>
                       <p>
                           mely@melymartinez.com
                       </p>
                   </div>
                   <div class="col-md-3 col-sm-4">
                       <span>Redes Sociales</span>
                       <div class="divide"></div>
                       <div class="col-md-12 col-sm-12 redes-sociales">
                           <div class="col-md-4 col-sm-4">
                               <a href="">
                                    <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                                    <i class="fa fa-facebook fa-stack-1x"></i>
                                    </span>
                               </a>
                          </div>
                           <div class="col-md-4 col-sm-4">
                               <a href="">
                                    <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                                    <i class="fa fa-twitter fa-stack-1x"></i>
                                    </span>
                               </a>
                           </div>
                           <div class="col-md-4 col-sm-4">
                               <a href="">
                                    <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                                    <i class="fa fa-youtube fa-stack-1x "></i>
                                    </span>
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
</script>

