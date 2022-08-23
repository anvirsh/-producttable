<template>
<admin-layout>
  <div>      
	<h1 v-if="success" class="text-center ml-10 mb-3 text-2xl" style="color:green">
	{{success}} &nbsp; &nbsp; 
	  <span style="cursor:pointer; font-size:90%" @click='success=""' > x  </span>
	</h1>	 
    <div class="mb-6 flex justify-between">
      <div class="bg-white rounded-md shadow overflow-x-12"> 
	  
	    <div class="bg-white rounded-md shadow overflow-x-auto">
		  <table class="w-full whitespace-nowrap">
			<tr class="text-left">
			  <th class="px-6 pt-6 pb-4">Артикул</th>
			  <th class="px-6 pt-6 pb-4">Название</th>
			  <th class="px-6 pt-6 pb-4">Статус</th>
			  <th class="px-6 pt-6 pb-4" colspan="2">Атрибуты</th>
			</tr>
			<tr v-for="product in products" :key="product.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
			  <td class="border-t">
				<inertia-link class="px-6 py-4 flex items-center focus:text-indigo-500" :href="route('products.edit', product.id)">
				  {{ product.article }}
				  <icon v-if="product.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2" />
				</inertia-link>
			  </td>
			  <td class="border-t">
				<inertia-link class="px-6 py-4 flex items-center" :href="route('products.edit', product.id)" tabindex="-1">
				  <div v-if="product.name">
					{{ product.name }}
				  </div>
				</inertia-link>
			  </td>
			  <td class="border-t">
				<inertia-link class="px-6 py-4 flex items-center" :href="route('products.edit', product.id)" tabindex="-1">
				  {{ product.status }}
				</inertia-link>
			  </td>
			  <td class="border-t">
				 <span :style="mycolor(product.data)" >		 
					цвет : <b>{{ fcolor(product.data) }}</b><br /> размер : <b>{{ fsize(product.data) }}</b>
				 </span>            
			  </td>
			  <td class="border-t w-px">
				<inertia-link class="px-4 flex items-center" :href="route('products.edit', product.id)" tabindex="-1">
				  <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
				</inertia-link>
			  </td>
			</tr>
			<tr v-if="products.length === 0">
			  <td class="border-t px-6 py-4" colspan="4">Продукты не найдены.</td>
			</tr>
		  </table>
	  
	  	  <div class="border-t px-6 py-4" >
		    <span class="text-gray-400">Всего : {{products.length}} шт.</span>
          </div>
        </div>
	   
      </div>
	  <div class="pl-20 pt-10" >
        <inertia-link class="btn-indigo" :href="route('products.create')"> 
		  <input class="btn-indigo" type="button" value="Создать" />
		  <!--  <input style="cursor:pointer" class="bg-blue-100 pb-2 w-20 rounded-md text-center font-bold" type="button" value="Создать" />  -->
        </inertia-link>
	  </div>	
    </div>

        <div class="mb-6 mt-8 flex justify-between items-center">              
	        <h5  v-if="admin" class="text-center mt-4 ml-6 mb-3 text-2xl" >Ваша роль "Admin"</h5>
			<h5 v-if="!admin" class="text-center mt-4 ml-6 mb-3 text-2xl" >Ваша роль "User" (Артикул не редактируется)</h5>
            <label class="mt-4 pr-10 select-none flex " for="admin">
              <input id="admin" v-model="admin"  @click='flag()' class="mr-1" type="checkbox" />
              <span class="text-sm">Admin</span>
            </label>
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
			   filters: Object,
			   products: Object,
			   success: String,
			   admin: Boolean,
		  },
		data() {
		   return { roladmin: this.admin,  } 
		},
		methods: {//напр.stjson=[{"key":"size","value":"XL"},{"key":"color","value":"Черный"}]-десерилизуем
			fcolor: function (stjson) {
			  let deSiriz = JSON.parse(stjson);
			  return deSiriz[1]['value'];//массив cработает
			},
			fsize: function (stjson) {
			  let deSiriz = JSON.parse(stjson);
			  return deSiriz[0].value;//объект тоже сработал
			},
			mycolor: function (stjson) {
			  let deSiriz = JSON.parse(stjson);
			  if(deSiriz[1]['value']=="Зелёный"){
			      return "color:green"; 
			  }
			  if(deSiriz[1]['value']=="Серый"){
			      return "color:grey"; 
			  }
			},
			flag: function () {
			 let chflag = false;
			 if(this.admin === true){chflag = false}else{chflag = true}
			 //chflag - здесь boolen но по сети пойдёт строкой скорее напр."false"
			 this.$inertia.post(this.route('flagadmin', {'flag':chflag}));
			}
		  }
    }
	
</script>
