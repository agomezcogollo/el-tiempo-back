<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>El Tiempo</title>
</head>

<body>
  <div class="col-12 mb-3" style="background-color: #0063ab; color: #0063ab;">
    <span>-</span>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <img src="/img/eltiempo_logo_1.png" class="img-fluid" alt="Logo el tiempo">
      </div>
      <div class="col-12 text-center mt-5">
        <h1>Bienvenido, <span>Amilcar Gómez</span></h1>     
      </div>
      <form id="formFileSkill" action="/api/uploadxls" method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-center">
          <div class="col-12 mt-5">
            <label for="formFileLg" class="form-label">Seleccione un archivo CSV separado por Punto y Coma " ; "</label>
            <input class="form-control form-control-lg" name="file" id="formFileLg" type="file">
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <div class="col-4 text-center mt-3">
            <div class="mb-1">
              <button type="submit" id="upFileSkills" class="btn" style="background-color: #0e65a5; color: white;">Cargar CSV</button>
            </div>
          </div>
        </div>
      </form>
      <div class="d-flex justify-content-center">
        <div class="col-4 text-center mt-3">
          <div class="mb-1">
            <span class="fs-3"><a href="http://127.0.0.1:5500/">Salir del sistema</a></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- <script src="assets/js/main_uploadSkill.js"></script> -->
</body>

</html>