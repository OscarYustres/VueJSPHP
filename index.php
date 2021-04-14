<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="#" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">        
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">        
    <link rel="stylesheet" href="estilos.css">  
    
</head>
<body>
    <header>
    <div class='container-fluid'>
      <div class='row'>
        <div class='jumbotron'>
          <div class='row'>
            <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'></div>
            <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8 text-center'>
              <h2 class='text-uppercase welcome-title '>Bienvenidos a Cinema</h2>
              <div class='jumbotron-text'>Síguenos en nuestras <abbr title='Facebook,Twitter, Instagram'>redes sociales</abbr> para obtener información sobre los últimos estrenos del cine</div>
              <div class='redes-sociales'>
                <img class='img-rounded img-social' src='img/fb.png'/>
                <img class='img-rounded img-social' src='img/ig.png'/>
                <img class='img-rounded img-social' src='img/tt.png'/>
              </div>
            </div>
          </div>
        </div>
        </div>
        </div>
        </div>
    </header>
    <div id="appCine">
    
          <div class="container">
          
                <div class="row">
                    <div class="col">
          <header class='titulo-text text-capitalize text-center'><button @click="btnAlta" title="NUEVO" style="color:black">Registrar Pelicula</button></header>
          </div>
          </div>
          
        
        

        <div class="row mt-5">
                <div class="col-lg-12">                    
                    <table class="table table-striped">
                        <thead>
                            <tr class="bg-primary text-light">
                                <th>CARATULA</th>                                    
                                <th>DESCRIPCION</th>
                                <th>DURACION</th>
                                <th>CATEGORIA</th>    
                                <th>TRAILER</th>
                                <th>VISTA</th>
                                <th>CALIFICACION</th>
                                <th>FECHA ESTRENO</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <tr v-for="(cine,indice) of peliculas">                                
                                <td>{{cine.Caratula}}</td>                                
                                <td>{{cine.Descripcion}}</td>
                                <td>{{cine.Duracion}}</td>
                                <td>{{cine.Categoria}}</td>
                                <td>{{cine.Trailer}}</td>
                                <td>{{cine.vista}}</td>
                                <td>{{cine.calificacion}}</td>
                                <td>{{cine.Fecha_estreno}}</td>
                                <td>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-secondary" title="Vista" @click="btnVista"><i class="fas fa-pencil-alt"></i></button>    
                                    <button class="btn btn-danger" title="Califica" @click="btnCalifica"><i class="fas fa-trash-alt"></i></button>      
								                  </div>
                                </td>
                            </tr>    
                        </tbody>
                    </table>                    
                </div>
            </div>
            </div>
      </div>






    
<script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>         
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>              
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.2/axios.js"></script>    
    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>      
    <script src="app.js"></script>         
</body>
</html>