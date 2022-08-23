<template>
<admin-layout>
  <div>
    <h3 class="ml-10 mb-3 text-xl">
      <inertia-link class="text-indigo-400 hover:text-indigo-600" :href="route('products')">
	    к списку
	  </inertia-link> - (Создание товара) . . . <span  class="font-bold" >{{form.name}}</span>
    </h3>
	<h1 v-if="errors" class="text-red ml-10 mb-3 text-2xl" style="color:red">{{errors.name}}</h1>
	<h1 v-if="errors" class="text-red ml-10 mb-3 text-2xl" style="color:red">{{errors.article}}</h1>
    <div class="bg-white rounded-md shadow overflow-hidden w-full">
      <form @submit.prevent="store">
        <div class="p-8 -mr-6 -mb-8">
		  <p class="text-gray-500">Артикул</p>
          <input v-model="form.article"   name="article" type="text" @click='errors.article=""' class="font-bold pr-6 pb-3 w-full lg:w-1/1"/>
		  <p class="text-gray-500">Наименование</p>
          <input v-model="form.name" name="name" type="text" @click='errors.name=""' class="font-bold pr-6 pb-3 w-full lg:w-1/1"/>
		  
          <p> . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . Атрибуты . . . . . . . . . . . .. . . . . . . . . . . . . . . . . .</p>
		  <div class="mb-6 w-full lg:w-1/1">
		  <p class="text-gray-500">Цвет</p>
		  <select v-model="form.color"  name="color"  class="font-bold pr-6 pb-3 w-full lg:w-1/2" required >
            <option value="grey">Серый</option>
            <option value="black">Чёрный</option>
			<option value="green">Зелёный</option>
          </select>
		  <p class="text-gray-500">Размер</p>		  
		  <select v-model="form.size" name="size"  class="font-bold pr-6 pb-3 w-full lg:w-1/2" required >
             <option  value="l">L</option>
             <option  value="xl">XL</option>
             <option  value="sm">Sm</option>			 
          </select> 
		  </div>
		  	  <label class="mt-2 mb-4 pr-10 select-none flex" >
				<input name="sendmail" v-model="sendmail"  @click='flagmail()' class="mr-1" type="checkbox" />
				<span class="text-sm" title="Задайте нужный email в конфигурации, в файле products.php">
				  Сообщить на {{adresemail}} при создании
				</span>
			  </label>
		  <p class="text-gray-500">Статус</p>
          <select v-model="form.status" name="status"  class="font-bold pr-6 pb-3 w-full lg:w-2/3" required>
            <option value="available">Доступен</option>
            <option value="unavailable">Не доступен</option>
          </select>
        </div>
        <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex items-center">
          <button   class="font-bold btn-indigo ml-auto" type="submit">Создать</button>
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
	adresemail: String,
    //size: Array,
  },
  remember: 'form',
	  data() {
		return {
		  form: this.$inertia.form({
			article: null,
			name: null,
			size: null,
			color: null,
			tdata: null,//!!!не даёт это поле назвать data
			status: null,
			sendmail: false,
		  }),
		}
	  },
  methods: {
    store() {
          let ksize  = this.form.size;   let szvol ='';
          let kcolor = this.form.color;	 let clvol ='';
		  if(ksize == 'l'){ szvol =  'L'};
		  if(ksize  =='xl'){ szvol = 'XL'};
		  if(ksize  =='sm'){ szvol = 'Sm'};
		  if(kcolor  =='grey'){ clvol = 'Серый'};
		  if(kcolor  =='black'){ clvol = 'Чёрный'};
		  if(kcolor  =='green'){ clvol = 'Зелёный'};		   
	  this.form.tdata = '[{"key":"size","value":"'+szvol+'"},{"key":"color","value":"'+clvol+'"}]',
      this.form.post(this.route('products.store'))
    },
	flagmail: function () {
		if(this.form.sendmail == true){this.form.sendmail = false}else{this.form.sendmail = true}			
	}
  },
}
</script>
