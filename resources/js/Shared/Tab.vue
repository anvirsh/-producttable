<style> 
p {
    margin: 0 0 10px;
}
 .vtabs__item {
    display: none;
}
.vtabs__item.is-active {
    display: block;
}
 </style> 
  <template>
    <div>
       <p v-show="isActive"><slot></slot>!!!!!!</p>
    </div>
  </template>
    
	<script>
export default {
    props: {
        name: { required: true },
        selected: { default: false}
    },
    data() {
        return {
            isActive: false
        };
    },
    
    computed: {
        href() {
            return '#' + this.name.toLowerCase().replace(/ /g, '-');
        }
    },
    mounted() {
        this.isActive = this.selected;
    }
}
</script>