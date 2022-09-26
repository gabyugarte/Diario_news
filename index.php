
<?php
session_start(); //Obligatorio para trabajar con las sessiones

include 'template/cabecera.php';  
?>
<!-- Secion: corousel - bootstrap--------------------------------------------------------------------------------------- -->
<section id="main">
    <!-- Para evitar la pausa del corrido de las imagenes cuando el mause esta sobre ella, agregamos data-bs-pause ="false" -->
    <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-pause=“false”>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/diario.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/queen.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/stop_war.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <div class="overlay carousel-caption">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 offset-md-6 text-right">
                        <h1>DIARIO NEWS</h1>
                        <p class = "d-none d-md-block"> Las últimas noticias del mundo. Noticias de Estados Unidos, México, Colombia, Argentina, otros países de Latinoamérica y el mundo en DIARIO NEWS.</p>
                        <!-- este boton nos lleva a las últimas noticias publicadas, las cuales las trae de la base de datos -->
                        <a href="noticias.php" class="btn btn-outline-light">Mira las noticias de hoy</a>
                        <!-- este boton sirve para el login, lo hice con un modal -->
                        <button type="button" class="btn btn-news" data-bs-toggle="modal" data-bs-target="#modalCompra">Login - Administrador</button>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Secion: corousel - bootstrap--------------------------------------------------------------------------------------- -->

 <!-- Modal LOGIN------------------------------------------------------------------------------------------------->
 <?php include 'administrador/login_modal.php'; ?>
<!-- /Modal LOGIN------------------------------------------------------------------------------------------->

<!-- Más noticias -->
<!-- La separamos de la sección main con clase mtop-4 mt-4-->
<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col text-center text-uppercase pb-2">
                <small>Conoce más de</small>
                <h2>DIARIO NEWS</h2>
            </div>
        </div>
        <div class="row">
            <!-- mb-4 = referencia a margin botton -->
            <div class="col col-md-4 mb-4 col-lg-3">
                <div class="card">
                    <img src="img/hawaii.jpg" class="card-img-top" alt="foto de una noticia">
                    <div class="card-body">
                        <div class="badges">
                            <span class="badge bg-warning">Hawai</span>
                            <span class="badge bg-info">Beach</span>
                        </div>
                        <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis maiores rerum numquam eveniet quod recusandae ut. Sed architecto aliquid vitae?</p>
                    </div>
                  </div>
            </div>
            <div class="col col-md-4 mb-4 col-lg-3">
                <div class="card">
                    <img src="img/hawaii.jpg" class="card-img-top" alt="foto de una noticia">
                    <div class="card-body">
                        <div class="badges">
                            <span class="badge bg-warning">Hawai</span>
                            <span class="badge bg-info">Beach</span>
                        </div>
                        <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis maiores rerum numquam eveniet quod recusandae ut. Sed architecto aliquid vitae?</p>
                    </div>
                  </div>
            </div>
            <div class="col col-md-4 mb-4 col-lg-3">
                <div class="card">
                    <img src="img/hawaii.jpg" class="card-img-top" alt="foto de una noticia">
                    <div class="card-body">
                        <div class="badges">
                            <span class="badge bg-warning">Hawai</span>
                            <span class="badge bg-info">Beach</span>
                        </div>
                        <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis maiores rerum numquam eveniet quod recusandae ut. Sed architecto aliquid vitae?</p>
                    </div>
                  </div>
            </div>
            <div class="col col-md-4 mb-4 col-lg-3">
                <div class="card">
                    <img src="img/hawaii.jpg" class="card-img-top" alt="foto de una noticia">
                    <div class="card-body">
                        <div class="badges">
                            <span class="badge bg-warning">Hawai</span>
                            <span class="badge bg-info">Beach</span>
                        </div>
                        <h5 class="card-title">Lorem ipsum dolor sit amet consectetur</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis maiores rerum numquam eveniet quod recusandae ut. Sed architecto aliquid vitae?</p>
                    </div>
                  </div>
            </div>
        </div>
    </div>
  </section>

  <!-- /Más noticias -->
<!-- Turismo -->
<section id="place-time">
    <!-- contenedor fluido -->
    <div class="container-fluid bg-dark text-light">
        <div class="row">
            <!-- para dispositivos grandes lg que ocupe 6 = col-lg-6 -->
            <div class="col-12 col-lg-6 p-0">
                <img src="img/hawaii3.jpeg" alt="Honolulu ciudad">
            </div>
            <!-- Paddin top:2 = pt-2 -->
            <div class="col-12 pt-4 col-lg-6 pb-4 ">
                <h2>Turismo en Honolulu</h2>
                <p>Honolulu es la capital y localidad más grande del estado de Hawái, en los Estados Unidos.Honolulu es la más sureña de entre las principales ciudades estadounidenses. Aunque el nombre de Honolulu se refiere al área urbana en la costa sureste de la isla de Oahu, la ciudad y el condado de Honolulu han formado una ciudad-condado consolidada que cubre toda la isla (aproximadamente 600 km² de superficie).
                </p>
                <a href="https://es.wikipedia.org/wiki/Honolulu" class="btn btn-outline-light" target="_blank">Conoce más</a>
            </div>
        </div>
    </div>
</section>
<!-- /Turismo -->

<!-- Suscríbete  -->

<section id="conviertete-en-orador" class="pt-2 pb-3">
    <div class="container">
        <div class="row">
            <div class="col text-uppercase text-center">
                <small>Sé parte de DIARIO NEWS</small>
                <h2>Suscríbete</h2>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                Suscríbete como editor para publicar y administrar las noticias. Vamos! anímate!
            </div>
        </div>
        <!-- Form grid boostrap -->
        <div class="row">
            <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2 pt-2">
                <div class="row">
                    <div class="form-label col-12 col-md-6">
                        <input type="text" class="form-control" placeholder="Nombre" aria-label="First name">
                    </div>
                    <div class="form-label col-12 col-md-6">
                        <input type="text" class="form-control" placeholder="Apellido" aria-label="Last name">
                    </div>
                </div>
                <div class="form-label">
					<div class="col">
						<textarea
							name="text"
							class="form-control form-control-lg"
							placeholder="Sobre qué quieres hablar?"
						></textarea>
						<small class="form-text text-muted">
							Recuerda incluir un titulo para tu noticia
						</small>
					</div>
                    <div class="form-label  d-grid gap-1">
                        <button class="btn btn-news" type="button">Enviar</button>
                    </div>
				</div>
            </div>
        </div>
    </div>
</section>

<!-- /Suscríbete  -->

<?php include 'template/pie.php'; ?>
