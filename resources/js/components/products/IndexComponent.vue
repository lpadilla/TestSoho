<template>  
  <div class="panel panel-default">      
      <div class="row">
        <div class="col-12">  
          <!-- Start Section Edit Product -->
          <transition v-if="showModal" @close="showModal=false" name="modal">
            <div class="modal-mask">
              <div class="modal-wrapper">
                <div class="modal-container">

                  <div class="modal-header">
                    <slot name="header">
                      <h3>Actualizar Producto</h3>
                    </slot>
                  </div>

                  <div class="modal-body">
                    <slot name="body">
                      <input type="hidden" disabled class="form-control" id="id_edit" name="id_edit"
                                required v-model="editItem.id">
                      Titulo: <input type="text" class="form-control" id="title_edit" name="title_edit"
                              required   v-model="editItem.title">
                      Código: <input type="number" class="form-control" id="code_edit" name="code_edit"
                      required  v-model="editItem.product_code">
                      Descripción: <input type="text" class="form-control" id="description_edit" name="description_edit"
                      required  v-model="editItem.description">
                    </slot>
                  </div>

                  <div class="modal-footer">
                    <slot name="footer">
                      <button class="btn btn-danger" @click="showModal = false">
                        Cancelar
                    </button>
                    
                    <button class="btn btn-primary" @click="editProduct()">
                        Actualizar
                    </button>
                    </slot>
                  </div>
                </div>
              </div>
            </div>
          </transition>
          <!-- End Section Edit Product -->

          <!-- Start Section Create Product -->
          <transition v-if="showCreate" @close="showCreate=false" name="modal">
            <div class="modal-mask">
              <div class="modal-wrapper">
                <div class="modal-container">

                  <div class="modal-header">
                    <slot name="header">
                      <h3>Crear Producto</h3>
                    </slot>
                  </div>

                  <div class="modal-body">
                    <slot name="body">
                      <div class="form-group">
                        <label for="title">Titulo:</label>
                        <input type="text" class="form-control" id="title" name="title" 
                              required v-model="newItem.title" placeholder="Titulo">
                      </div>
                      <div class="form-group">
                        <label for="product_code">Código:</label>
                        <input type="number" class="form-control" id="product_code" name="product_code" 
                              required v-model="newItem.product_code" placeholder="Codigo">
                      </div>
                      <div class="form-group">
                        <label for="description">Descripción:</label>
                        <input type="text" class="form-control" id="description" name="description"
                          required v-model="newItem.description" placeholder=" Descripción">
                      </div>                      
                    </slot>
                  </div>
                  <div class="modal-footer">
                    <slot name="footer">
                      <button class="btn btn-danger" @click="showCreate = false">
                        Cancelar
                    </button>
                    
                    <button class="btn btn-primary" @click.prevent="createItem()">
                        Crear
                    </button>
                    </slot>
                  </div>
                </div>
              </div>
            </div>
          </transition>
          <!-- End Create Product -->

          <!-- Start List Products -->
          <h1 class="text-center">Listado de Productos</h1>
          <table class="table table-bordered" id="laravel_crud">
            <thead>
              <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th colspan="2">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="product in arrayProducts" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.title }}</td>
                <td>{{ product.product_code }}</td>
                <td>{{ product.description }}</td>
                <td>{{ product.created_at }}</td>  
                <td><button id="show-modal" @click="showModal=true; setVal(product.id, product.title, product.product_code, product.description)" class="btn">Modificar</button></td>
                <td><button class="btn" @click="deleteProduct(product)">Eliminar</button></td>  
              </tr>
            </tbody>
          </table>
          <button id="show-modal" @click="showCreate=true;" class="btn btn-primary">Crear Producto</button>
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
                arrayProduct:[],
                newItem: { 'title': '','product_code': '','description': '' },
                editItem: { 'id':'', 'title': '','product_code': '','description': '' },  
                showModal:false,   
                showCreate:false,                
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
            },            
            setVal(product_id, product_title, product_code, product_description) {
                this.editItem = { 'id':product_id, 'title': product_title,'product_code': product_code,'description': product_description };
            },
            editProduct(data){
              var me = this;
              var input = me.editItem;
              if (input['id'] == '' || input['title'] == '' || input['product_code'] == '' || input['description'] == '' ) {
                    this.hasError = false;
              }else{        
                this.hasError = true;        
                axios.post('/api/v1/products/' + me.editItem['id'], {
                    val_1: me.editItem['id'], 
                    val_2: me.editItem['title'],
                    val_3: me.editItem['product_code'], 
                    val_4: me.editItem['description'], 
                    _method: 'patch' })
                .then(response => {
                  this.getProducts();
                  //se limpia el formulario
                  me.editItem = { 'title': '','product_code': '','description': '' };
                  //se oculta el form
                  me.showModal = false;
                })
                .catch(function (error) {
                    console.log(error);
                });
              }
            },
            createItem: function createItem() {
                var me = this;
                var input = this.newItem;
                
                if (input['title'] == '' || input['product_code'] == '' || input['description'] == '' ) {
                    this.hasError = false;
                } else {
                    this.hasError = true;
                    console.log("aaaaaaaa");
                    axios.post('/api/v1/products/', input).then(function (response) {
                        me.getProducts();
                    });
                    //se limpia el formulario
                    me.newItem = { 'title': '','product_code': '','description': '' };
                    //se oculta el form
                    me.showCreate = false;
                }
            },
            deleteProduct(data){//Esta nos abrirá un alert de javascript y si aceptamos borrará el producto que hemos elegido
                let me =this;
                let product_id = data.id
                if (confirm('¿Seguro que deseas borrar este producto?')) {
                    axios.delete('api/v1/products/'+product_id
                    ).then(function (response) {
                        me.getProducts();
                    })
                    .catch(function (error) {
                        console.log(error);
                    }); 
                }
            }
        },
        mounted() {
           this.getProducts();
        }
    }
</script>