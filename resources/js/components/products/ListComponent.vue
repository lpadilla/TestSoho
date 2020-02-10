<template>  
  <div class="panel panel-default">      
      <div class="row">
        <div class="col-12">  
          <!-- Start List Products -->
          <h1 class="text-center">Listado de Productos</h1>
          <table class="table table-bordered" id="laravel_list">
            <thead>
              <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="product in arrayProducts" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.title }}</td>
                <td>{{ product.product_code }}</td>
                <td>{{ product.description }}</td>
                <td>{{ product.created_at }}</td>  
              </tr>
            </tbody>
          </table>
          <!-- End List Products -->
        </div>
      </div>
  </div>
</template>

<script>
    
    export default {
        data: function () {
            return {
                arrayProducts:[],            
            }
        },
        methods: {
            getProducts(){
                let me =this;
                let url = '/api/v1/products/' //Ruta que hemos creado para que nos devuelva todas las tareas
                axios.get(url).then(function (response) {
                    me.arrayProducts = response.data;    
                    console.log(me.arrayProducts);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            }
        },
        mounted() {
           this.getProducts();
        }
    }
</script>