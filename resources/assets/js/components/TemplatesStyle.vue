<template>
	<div>
		<div v-for="template_style in templates_style" @click="selected = template_style.id">
			<img :src="$Config.base_url+template_style.small_image" style="display: block" />
			<i class="fa fa-check" v-if="selected == template_style.id"></i>
		</div>
	</div>
</template>
<script>
	export default {
	    props: {
	        templates_style: {
	            default: () => []
	        },
	        initial_selected: {
	        	default: null
	        }
	    },
	    data(){
	    	return {
	    		selected: this.initial_selected
	    	}
	    },
        watch: {
            'selected': {
                handler: function (selected, oldSelected) {
			    	if(this.selected){
			    		let selected_template_style = 
			    				this.templates_style.find( (ts) => { return ts.id == this.selected } );
			    		this.$emit("selected_template_style", selected_template_style);
			    	}
                },
                immediate: true
            },
        }
	}
</script>