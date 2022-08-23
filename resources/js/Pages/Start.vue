<template>    
     <div>
	 
 
 <!-- Snippet -->
<section class="flex flex-col justify-center antialiased bg-gray-100 text-gray-600 max-h-screen p-5">
    <div class="h-full">
        <!-- Card -->
        <div class="max-w-lg max-h-lg mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <div class="flex flex-col h-full">
                <!-- Card top -->
                <div class="flex-grow p-5">
                    <div class="flex justify-between items-start">
                        <!-- Image + name -->
                        <header>
                            <div class="flex mb-2">
                                <a class="relative inline-flex items-start mr-5" href="#0">
                                     
                                    <img class="rounded-full" src="logo.jpg" width="200" height="150" alt="logo" />
                                </a>
                                <div class="mt-1 pr-1">
                                    <a class="inline-flex text-gray-800 hover:text-gray-900" href="#0">
                                        <h2 class="text-xl leading-snug justify-center font-semibold">Техзадание по Laravel</h2>
                                    </a>
                                    <div class="flex items-center"><span class="text-md font-medium text-gray-700  mr-1">Мини-сайт "Таблица продуктов"</span></div>
                                </div>
                            </div>
                        </header>
                        
 
                    </div>
                    <!-- Bio -->
                    <div class="mt-2">
                        <div class="text-lg">
						   <p>1) Приложение должно использовать Postgres.<br>
						      2) Вид админпанели с таблицей продуктов.<br> 
							  3) Возможность CRUD и карточку продукта<br>
							  4) Наличие поля data (для color-size тип jsonb)<br>
							     и поля status (доступен/нет товар).<br>
							  5) Валидация полей, название min:10, <br>
                                 атрикул - уникальный лат. буквы и цыфры.<br>
                              6) Создать роли, где только admin <br> может править артикул. <br>
                              7) Роли и email задаются в файле config.<br>
								 ------------------------<br>
								 Дополнительно при создании продукта сделать<br>
								 отправку email по каналу (email Notification)<br>
								 через очередь поместив задачу в job.<br>
								 Приложение упаковать в докер и выложит на GitHab.
						   </p> 
						</div>
                    </div>
                </div>
                <!-- Card footer -->
                <div class="border-t border-gray-200">
                    <div class="flex divide-x divide-gray-200r">
                      	<div class="bg-white mb-3 pb-3 pt-3 pl-10">
						    Выполнено на Laravel/Inertia.js (laradock) -
							<inertia-link :href="route('products')">
							   <span style="color:blue"> Просмотреть </span>
							</inertia-link>
                       </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 
 
			
			
    </div>    
</template>

<script>    
    //import Welcome from '@/Jetstream/Welcome'
    export default {
        components: {            
            //Welcome,
        },
	props: {
           infa: Object,
           
      },
    } 
</script>
