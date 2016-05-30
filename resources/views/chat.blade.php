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



         
     <section >
                    <form >
	                 
	                     <a>Usuario1</a>
	                     <input type="text" required="" v-model="newusuario">
                       <a>Usuario2</a>
                       <input type="text" required="" v-model="newusuario2">
	             		    <button type="submit" class="btn" v-show="newusuario2" >iniciar chat</button>
	                

                    </form>
    </section>


    <section >
                    <form @submit.prevent="storeChat">
                   
                       <a>@{{newusuario}} :</a>
                       <input type="text" required="" v-model="newmensaje" >
                       <button type="submit" class="btn">enviar</button>
                          <br> <br>
                       <!-- <a >@{{newusuario2}} :</a>
                       <input type="text" required="" v-model="newmensaje2">
                      <button type="submit" class="btn" >enviar</button> -->
                  
                    </form>
                     <form @submit.prevent="storeChatt">
                   
                       <a >@{{newusuario2}} :</a>
                       <input type="text" required="" v-model="newmensaje2" >
                       <button type="submit" class="btn">enviar</button>
                          <br> <br>
                       <!-- <a >@{{newusuario2}} :</a>
                       <input type="text" required="" v-model="newmensaje2">
                      <button type="submit" class="btn" >enviar</button> -->
                  
                    </form>

    </section>
           
    
<div class="row">
      <div class="col s12 l3">
   
   <ul class="center">

          <li>
                <div ><i ></i>
                  <b>Chat xD</b>
                </div>
                  <p  v-for="chats in chat">
                    
                    <label for="test@{{$index}}">@{{chats.usuario}}  @{{chats.mensaje}}</label>
                    
                </p>
            </li>
        </ul>

                 
</div>
</div>

	<section>
   <input type="text" v-model=" hola"> 
   <br>
   <a>@{{hola}}</a>
  </section>


<script src="/js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue/1.0.24/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>
  
<script src="/js/materialize.min.js"></script>
<script src="/js/app.js"></script>

	<script>
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
new Vue({
		el:"body",
		
    data:{
			newusuario:"",
			newusuario2: "",
      newmensaje:"",
      newmensaje2:"",
      hola:""
		},
			ready: function() {
    	  	this.getChat();
  		},
  		 methods:{
  		 	getChat: function(){
      this.$http.get('/chat/obtener').then(function(response){
        this.$set('chat', response.data);
      });
    },  		 	
        storeChat: function(){
            // peticion AJAX  
            this.$http.post('/chat/storeChat', {'usuario': this.newusuario,'mensaje': this.newmensaje}).then(function(response){
              this.chat.push(response.data);
              Materialize.toast('Mensjae enviado', 3500)
              this.newmensaje = "";
            },function(error) {
              Materialize.toast('Error', 3500)
              this.newnombre = "";
            });
        },
        storeChatt: function(){
            // peticion AJAX  
            this.$http.post('/chat/storeChatt', {'usuario': this.newusuario2,'mensaje': this.newmensaje2}).then(function(response){
              this.chat.push(response.data);
              Materialize.toast('Mensjae enviado', 3500)
              this.newmensaje2 = "";
             
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