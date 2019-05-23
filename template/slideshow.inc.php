<!-------------------------slideshow-------------------------------->
<section class="slide container my-4">
    <div id="carouselFade" class="carousel slide carousel-fade shadow-lg" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselFade" data-slide-to="0" class="active"></li>
            <li data-target="#carouselFade" data-slide-to="1"></li>
            <li data-target="#carouselFade" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner rounded">
            <div class="carousel-item active" data-interval="10000">
            <img src="<?php echo RUTA_IMAGEN ?>odonto.jpg" class="d-block w-100" alt="..." height="350px">
            </div>
            <div class="carousel-item" data-interval="10000">
            <img src="<?php echo RUTA_IMAGEN ?>odonto1.jpg" class="d-block w-100" alt="..." height="350px">
            </div>
            <div class="carousel-item" data-interval="10000">
            <img src="<?php echo RUTA_IMAGEN ?>odonto2.jpg" class="d-block w-100" alt="..." height="350px">
        </div>
        <a class="carousel-control-prev" href="#carouselFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>