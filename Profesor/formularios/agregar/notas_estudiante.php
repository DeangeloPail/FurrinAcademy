<?php

include("../../sql/vistas/notas_estudiante.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div class="card">
        <div class="card-body">
            <div class="text-start">
                <div class="row align-items-start">
                    <div class="col-md-6">
                        <p>Nombre de estudiante: <?php echo "$nombre $apellido ";?></p>
                        <p>Cedula de estudiante: <?php echo "$cedula";?></p>
                        <p>Curso: <?php echo "$nombreCurso";?></p>
                        <p>Duracion de curso: <?php echo "$duracion";?> horas</p>
                        <p>Tipo de curso: <?php echo "$tipoCurso";?></p>
                        <p>Area de curso: <?php echo "$area";?></p>
                    </div>
                    <div class="col-md-6">
                        <form class="row g-3" id="formulario" action="../../sql/agregar/notas_estudiante.php" method="POST" enctype="multipart/form-data" class="row  mx-3 g-3 needs-validation" novalidate >
                                <input type="hidden" class="form-control" name="codigo" value=<?php echo "$codigo"; ?>>

                            <div class="col-md-6">
                                <label for="nota1" class="form-label">Nota del corte 1</label>
                                <input type="text" class="form-control" id="nota1" name="nota1" value=<?php echo "$nota1";?>>
                                <div id="alertanota1"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="nota2" class="form-label">Nota del corte 2</label>
                                <input type="text" class="form-control" id="nota2" name="nota2" value=<?php echo "$nota2";?>>
                                <div id="alertanota2"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="nota3" class="form-label">Nota del corte 3</label>
                                <input type="text" class="form-control" id="nota3" name="nota3" value=<?php echo "$nota3";?>>
                                <div id="alertanota3"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="nota4" class="form-label">Nota del corte 4</label>
                                <input type="text" class="form-control" id="nota4" name="nota4" value=<?php echo "$nota4";?>>
                                <div id="alertanota4"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

  </body>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../js/agregar_notas_estudiante.js"></script>
</html>