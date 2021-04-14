var url = "bd/crud.php";

var appCine = new Vue ({
    el: "#appCine",
    data: {
        peliculas:[],
        Caratula: "",
        Titulo: "", 
        Descripcion: "",
        Duracion: "", 
        Categoria: "", 
        Trailer: "", 
        vista: "",
        calificacion: "",
        Fecha_estreno: "",

    },
    methods:{
     //BOTONES        
     btnAlta:async function(){                    
        const {value: formValues} = await Swal.fire({
        title: 'NUEVO',
        html:
        '<div class="row col-ls-8"><label class="col-sm-3 col-form-label">Caratula</label><div class="col-sm-7"><input id="Caratula" type="text" class="form-control"></div></div><div class="row"><label class="col-sm-3 col-form-label">Titulo</label><div class="col-sm-7"><input id="Titulo" type="text" class="form-control"></div></div><div class="row"><label class="col-sm-3 col-form-label">Descripcion</label><div class="col-sm-7"><input id="Descripcion" type="text" class="form-control"></div></div><div class="row"><label class="col-sm-3 col-form-label">Duracion</label><div class="col-sm-7"><input id="Duracion" type="text" class="form-control"></div></div><div class="row"><label class="col-sm-3 col-form-label">Categoria</label><div class="col-sm-7"><input id="Categoria" type="text" class="form-control"></div></div><div class="row"><label class="col-sm-3 col-form-label">Trailer</label><div class="col-sm-7"><input id="Trailer" type="text" class="form-control"></div></div><div class="row"><label class="col-sm-3 col-form-label">Fecha Estreno</label><div class="col-sm-7"><input id="Fecha_estreno" type="date" data-inputmask="alias": "yyyy/mm/dd" class="form-control"></div></div>',              
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',          
        confirmButtonColor:'#1cc88a',          
        cancelButtonColor:'#3085d6',  
        preConfirm: () => {            
            return [
              this.Caratula = document.getElementById('Caratula').value,
              this.Titulo = document.getElementById('Titulo').value,
              this.Descripcion = document.getElementById('Descripcion').value,
              this.Duracion = document.getElementById('Duracion').value,
             this.Categoria = document.getElementById('Categoria').value,
             this.Trailer = document.getElementById('Trailer').value,
             this.Fecha_estreno = document.getElementById('Fecha_estreno').value                    
            ]
          }
        })        
        if(this.Caratula == "" || this.Titulo == "" || this.Descripcion == "" || this.Categoria == "" || this.Fecha_estreno == ""){
                Swal.fire({
                  type: 'info',
                  title: 'Datos incompletos',                                    
                }) 
        }       
        else{          
          this.altaCine();          
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            Toast.fire({
              type: 'success',
              title: '¡Pelicula Registrada!'
            })                
        }
    },           
    btnVista:async function(){                    
      await Swal.fire({
      title: 'Vista',
      html:
        '<div class="form-group"><div class="row"><label class="col-sm-3 col-form-label">Marca</label><div class="col-sm-7"><input id="vista" value="" type="text" class="form-control"></div></div>', 
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',          
        confirmButtonColor:'#1cc88a',          
        cancelButtonColor:'#3085d6',  
        preConfirm: () => {            
            return [
              this.vista = document.getElementById('vista').value                   
            ]
          }
        })        
        if(this.vista == ""){
                Swal.fire({
                  type: 'info',
                  title: 'Datos incompletos',                                    
                }) 
        }       
        else{          
          this.editarCine();          
          const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });
            Toast.fire({
              type: 'success',
              title: '¡Pelicula Vista!'
            })                
        }
    },           
    btnCalifica: async function(id, calificacion){        
        await Swal.fire({
            title: 'Califica',
            html:
            '<div class="form-group"><div class="row"><label class="col-sm-3 col-form-label">Marca</label><div class="col-sm-7"><input id="calificacion" placeholder="Califica de 1 a 5" min="1" max="5" value="" type="number" class="form-control"></div></div>', 
            focusConfirm: false,
            showCancelButton: true,                         
            }).then((result) => {
              if (result.value) {                                             
                calificacion = document.getElementById('calificacion').value,    
                
                this.editarCalificacion(id,calificacion);
                Swal.fire(
                  '¡Actualizado!',
                  'El registro ha sido actualizado.',
                  'success'
                )                  
              }
            });
            
        },        
    
    //PROCEDIMIENTOS para el CRUD     
    listarPeliculas: function(){
        axios.post(url, {opcion:4}).then(response =>{
           this.peliculas = response.data;
           console.log(this.peliculas);       
        });
    },    
    //Procedimiento CREAR.
    altaCine:function(){
        axios.post(url, {opcion:1, Caratula:this.Caratula, Titulo:this.Titulo, Descripcion:this.Descripcion, Duracion:this.Duracion, Categoria:this.Categoria, Trailer:this.Trailer, Fecha_estreno:this.Fecha_estreno}).then(response =>{
            this.listarPeliculas();
        });
        this.Caratula = "", 
        this.Titulo = "", 
        this.Descripcion = "",
        this.Duracion = "", 
        this.Categoria = "", 
        this.Trailer = "", 
        this.Fecha_estreno = ""        
         
    },               
    //Procedimiento EDITAR.
    editarCine:function(id,vista){       
       axios.post(url, {opcion:2, id:id, vista:vista,  }).then(response =>{           
           this.listarPeliculas();           
        });
        this.vista = ""                         
    },
    editarCalificacion:function(id,calificacion){       
      axios.post(url, {opcion:2, id:id, calificacion:calificacion }).then(response =>{           
          this.listarPeliculas();           
       });
       this.calificacion = ""                               
   },       
              
},      

  created: function() {
        this.listarPeliculas();
    }
});