   <style>
.vtabs {
    max-width: 1000px;
    margin: 0px ;
}
.vtabs__nav {
    display: flex;
}
.vtabs__nav-btn {
    padding: 15px 10px;
    font-size: 20px;
    background-color: #f5f5f5;
    border: 0;
    border-right: 1px solid #ddd;
    cursor: pointer;
}
.vtabs__nav-btn:last-child {
    border-right: none;
}
.vtabs__nav-btn:hover {
    background-color: #ddd;
}
.vtabs__nav-btn.is-active {
    background-color: #ddd;
    border-right-color: #5e3ddf;
    color: #333;
}
.vtabs__content {
    padding: 30px;
    background-color: #ddd;
}
  </style>
   <template>
        <div >
            <div  class="vtabs"> 
               <div class="vtabs__nav"> 
                <div class="vtabs__nav-btn" v-for="tab in tabs" :class="{ 'is-active': tab.isActive }">
                    <a :href="tab.href" @click="selectTab(tab)">{{ tab.name }}???</a>
                </div>
              </div>
            </div>
           
            <div class="vtabs__content">
                <slot></slot>
            </div>
        </div>
    </template>
    <script>
export default {
    data() {
        return {tabs: [] };
    },
    created() {
        this.tabs = this.$children;
    },
    methods: {
        selectTab(selectedTab) {
            this.tabs.forEach(tab => {
                tab.isActive = (tab.name == selectedTab.name);
            });
        }
    }
}
</script>
 