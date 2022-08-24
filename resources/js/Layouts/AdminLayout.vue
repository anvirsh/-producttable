<template>
    <div>
	 
	    <!--Nav-->
    <nav class="bg-gray-200 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink">
			     <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <inertia-link :href="route('start')">
	                        <img  :src="foto" />
	                    </inertia-link> 
                    </div> 
                 </div>
            </div>
			<div class="flex-1 md:flex-none md:mr-1">
				<a class="inline-block py-1 px-4" href="#">
				  <inertia-link :href="route('products')">
					 <span style="color:red"> ПРОДУКТЫ </span>
				  </inertia-link>						   
				</a>
			</div>
            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
             </div>

            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="flex-1 md:flex-none md:mr-3">
                        <div class="relative inline-block">
                            <button   class="drop-button text-white focus:outline-none"> 
							 
							   <a class="inline-block text-gray-400"> Иванов Иван Иваныч </a>  
							</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

	
	
	     <div class="flex flex-col md:flex-row">
	   <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-14 md:relative md:h-screen z-10 w-full md:w-48">  
       <!-- <div class="bg-yellow-600 shadow-xl bottom-0 mt-12 md:relative z-10 w-full md:w-48"> в желт-стиль-->
            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
					<li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
 						  <inertia-link :href="route('contacts')">
							 <span class="pb-1 ml-4 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block"> Контакты </span>
						  </inertia-link>						   
                        </a>
                    </li>
					<li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
 						  <inertia-link :href="route('products')">
							 <span class="pb-1 ml-4 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block"> Продукты </span>
						  </inertia-link>						   
                        </a>
                    </li>
                 </ul>
            </div>
        </div>
        <div class="main-content flex-1 bg-gray-100 bottom-0 mt-12  md:h-screen z-10 w-full">
            <div class="flex flex-wrap">
            </div>
            <div class="flex flex-row flex-wrap flex-grow mt-2">
		

            	            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
	 
			
            </div> 
        </div>
    </div>
	
	
	
 
      </div>
</template>

<script>
 

export default { 

  data(){
    return { foto : '/logo.jpg' }
  },
  mounted(){
	//console.log("---!!! ");
  }
}  
</script>
