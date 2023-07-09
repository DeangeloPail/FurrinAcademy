<?php
require_once 'includes/header.php';

?>



<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Bienvenido</h1>
          <p><?php

echo "Bienvenido a tu area de trabajo ". $nombreUsuario;

?></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Panel Administrativo</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x" style= "background-color:#2f6fe7"></i>
            <div class="info">
              <?php include 'config/conejf.php';
              $query = "SELECT COUNT(codigo_usuario) AS num FROM usuario";
              $resquery = mysqli_query($conexionjf, $query);
              $row = mysqli_fetch_assoc($resquery);
              ?>

              <h4>Usuarios</h4>
              <p><b><?php echo $row['num']?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon "  style= "background-color:#1b9dcf;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
  <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
  <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
</svg></i>
            <div class="info">
            <?php include 'config/conejf.php';
              $query = "SELECT COUNT(Codigo_estudiante) AS num FROM estudiante";
              $resquery = mysqli_query($conexionjf, $query);
              $row1 = mysqli_fetch_assoc($resquery);
              ?>
              <h4>Estudiantes</h4>
              <p><b></b><strong><?php echo $row1['num']?></strong></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon" style= "background-color:#2f6fe7;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16">
  <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
  <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z"/>
</svg></i>
            <div class="info">
            <?php include 'config/conejf.php';
              $query = "SELECT COUNT(codigo_profesor) AS num FROM profesores";
              $resquery = mysqli_query($conexionjf, $query);
              $row2 = mysqli_fetch_assoc($resquery);
              ?>
              <h4>Profesores</h4>
              <p><b><strong><?php echo $row2['num']?></strong></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon" style="background-color: #1b9dcf;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
  <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
  <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
</svg></i>
            <div class="info">
            <?php include 'config/conejf.php';
              $query = "SELECT COUNT(codigo_curso) AS num FROM curso";
              $resquery = mysqli_query($conexionjf, $query);
              $row3 = mysqli_fetch_assoc($resquery);
              ?>
              <h4>Cursos</h4>
              <p><b><strong><?php echo $row3['num']?></strong></b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body"></div>
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" >
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="images/3.png" class="d-block w-100" alt="..." style="border-radius: 12px;">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/4.png" class="d-block w-100" alt="..."style="border-radius: 12px;">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/5.png" class="d-block w-100" alt="..."style="border-radius: 12px;">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="images/6.png" class="d-block w-100" alt="..."style="border-radius: 12px;">
    </div>
    <div class="carousel-item">
      <img src="images/7.png" class="d-block w-100" alt="..."style="border-radius: 12px;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

</div>
          </div>
        </div>
      </div>
    </main>
<?php 

include('./template/cabecera.php');
?>

<?php
require_once 'includes/footer.php';
?>

