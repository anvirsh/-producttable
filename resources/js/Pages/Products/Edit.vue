<template>
<admin-layout>
  <div>
    <h3 class="ml-10 mb-3 text-xl">
      <inertia-link class="text-indigo-400 hover:text-indigo-600" :href="route('products')">
	    к списку
	  </inertia-link> - (Рерактирование) . . . <span class="font-bold" >{{form.name}}</span>
    </h3>
	<h1 v-if="success" class="text-center ml-10 mb-3 text-2xl" style="color:green">
	{{success}} &nbsp; &nbsp; 
	  <span style="cursor:pointer; font-size:90%" @click='success=""' > x  </span>
	</h1>
	<h1 v-if="errors" class="text-red ml-10 mb-3 text-2xl"  @click='errors.name=""' style="color:red">{{errors.name}}</h1>
	<h1 v-if="errors" class="text-red ml-10 mb-3 text-2xl"  @click='errors.article=""' style="color:red">{{errors.article}}</h1>
    <div class="bg-white rounded-md shadow overflow-hidden w-full">
      <form @submit.prevent="update">
        <div class="p-8 -mr-6 -mb-8">
		  <p class="text-gray-500">Артикул</p>
          <input v-if="admin" v-model="form.article" type="text" dsabled  @click='errors.article=""' class="font-bold pr-6 pb-3 w-full lg:w-1/1"/>
		  <span v-if="!admin"   class="font-bold pr-6 pb-3 w-full lg:w-2/1 text-2xl">{{form.article}} </span>
		  <p class="text-gray-500">Наименование</p>
          <input  v-model="form.name" type="text"  @click='errors.name=""' class="font-bold pr-6 pb-3 w-full lg:w-1/1"/>
          <p> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . Атрибуты . . . . . . . . . . . .. . . . . . . . . . . . . . . . . .</p>
		  <div class="mb-4 w-full lg:w-1/1">
			  <p class="text-gray-500">Цвет</p>
			  <select  name="color"  v-model="form.color"  class="font-bold pr-6 pb-3 w-full lg:w-1/2" >
				<option value="grey">Серый</option>
				<option value="black">Чёрный</option>
				<option value="green">Зелёный</option>
			  </select>
			  <p class="text-gray-500">Размер</p>		  
			  <select name="size" v-model="form.size"   class="font-bold pr-6 pb-3 w-full lg:w-1/2" >
				 <option  value="l">L</option>
				 <option  value="xl">XL</option>
				 <option  value="sm">Sm</option>			 
			  </select> 
           </div>
		  <p class="text-gray-500">Статус</p>
          <select name="data" v-model="form.status"  class="font-bold pr-6 pb-3 w-full lg:w-2/3">
            <option value="available">Доступен</option>
            <option value="unavailable">Не доступен</option>
          </select>
        </div>
        <div class="px-8 mt-4 py-1 bg-gray-50 border-t border-gray-100 flex items-center">
          <button v-if="!product.deleted_at" class="text-red-600 hover:underline"   type="button" @click="destroy">Удалить</button>
          <button   class="font-bold btn-indigo ml-auto" type="submit">Сохранить</button>
        </div>
      </form>
    </div>
  </div>
  </admin-layout>
</template>

<script>
 
  import AdminLayout from '@/Layouts/AdminLayout'

export default {
  components: {
     AdminLayout,  
  },  
  props: {
    product: Object,
	errors: Object,
	success: '',
	admin: Boolean,
    //size: Array,
  },
  remember: 'form',
  data() {
		return {
		  sendmail: false,
		  inform: '',
		  form: this.$inertia.form({
		    id: this.product.id,
			article: this.product.article,
			name: this.product.name,
			size: this.product.size,
			color:  this.product.color,
			tdata: this.product.data,
			status: this.product.status,
		  }),
		}
	  },
	beforeCreate: function(){ let col; let sze;//Для удобства распарсим json под форму
        let objSC = JSON.parse(this.product.data);
       //напр. objSC=[{"key":"size","value":"XL"},{"key":"color","value":"Черный"}]
		  if(objSC.[0]['value']=='L'){ sze = 'l'};
		  if(objSC.[0]['value']=='XL'){ sze = 'xl'};
		  if(objSC.[0]['value']=='Sm'){ sze = 'sm'};
         this.product.size = sze;
		  if(objSC.[1]['value']=='Серый'){ col = 'grey'};
		  if(objSC.[1]['value']=='Чёрный'){ col = 'black'};
		  if(objSC.[1]['value']=='Зелёный'){ col = 'green'};
		 this.product.color = col; 
    }, 
  methods: {
    update() {
	      let ksize  = this.form.size;   let szvol ='';
          let kcolor = this.form.color;	 let clvol ='';
		  if(ksize == 'l'){ szvol =  'L'};
		  if(ksize  =='xl'){ szvol = 'XL'};
		  if(ksize  =='sm'){ szvol = 'Sm'};
		  if(kcolor  =='grey'){ clvol = 'Серый'};
		  if(kcolor  =='black'){ clvol = 'Чёрный'};
		  if(kcolor  =='green'){ clvol = 'Зелёный'};		   
	  this.form.tdata = '[{"key":"size","value":"'+szvol+'"},{"key":"color","value":"'+clvol+'"}]',
      this.form.put(this.route('products.update', this.product.id))
    },
    destroy() {
      if (confirm('Удалить - '+ this.product.name+' ?')) {
         this.$inertia.delete(this.route('products.destroy', this.product.id))
      }
    },
  },
}
</script>
