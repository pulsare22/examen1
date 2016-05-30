<!DOCTYPE html>
<html>
<head>
<meta id="token" name="token" value="{{ csrf_token() }}">
  <link rel="icon" href="/img/favicon.ico" type="image/x-icon"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href='//fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/css/materialize.min.css"/>
  <link rel="stylesheet" href="/css/app.css"/>
</head>
<body>


<ul class="collapsible" data-collapsible="accordion">
   <li>
          <div class="collapsible-header "><i  aria-hidden="true"></i>
               	 <button type="button" class="btn"  >agregar contacto</button>
          </div>
            <div class="collapsible-body">
                    <form @submit.prevent="storeContacto">
	                  <div>
	                     <a>nombre</a>
	                     <input type="text" required="" v-model="newnombre">
	                     <a>telefono</a>
	                     <input type="text" required="" v-model="newnumero">
	             		 <button type="submit" class="btn" v-show="newnumero">enviar contacto</button>
	                  </div>
                    </form>
            </div>
    </li>

</ul>

<div class="row">
      <div class="col s12 l3">
   
   <ul class="center">

          <li>
                <div ><i ></i>
                  <b>Nombre     -   Telefono</b>
                </div>
                  <p  v-for="contacto in contactos">
                    
                    <label for="test@{{$index}}">@{{contacto.nombre}}  @{{contacto.telefono}}</label>
                    
                </p>
            </li>
        </ul>


</div>
</div>

	



<script src="/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue/1.0.21/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
<script src="/js/materialize.min.js"></script>
<script src="/js/app.js"></script>

	<script>

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
new Vue({
		el:"body",
		data:{
			newnombre:"",
			newnumero: ""
		},
			ready: function() {
    	  	this.getIdiomas();
  		},
  		 methods:{
  		 	getIdiomas: function(){
      this.$http.get('/contacto/obtener').then(function(response){
        this.$set('contactos', response.data);
      });
    },
  		 	storeContacto: function(){
			      // peticion AJAX  
			      this.$http.post('/contacto/storeAgenda', {'nombre': this.newnombre,'telefono': this.newnumero}).then(function(response){
			        this.contactos.push(response.data);
			        Materialize.toast('Contacto agregado correctamente', 3500)
			        this.newnombre = "";
			        this.newnumero = "";
			      },function(error) {
			        Materialize.toast('Error', 3500)
			        this.newnombre = "";
			      });
    		}

  		 }
	});


    </script>
</body>
</html>