<style scoped>

.templates {
	display: flex;
	flex-wrap: wrap;
}

.template-img {
	width: 50%;
	padding: 10px;
	position: relative;
}

.check-container {
	padding: 2px;
	top: 10px;
	right: 10px;
	background-color: #5ba01f; 
	color: white;
	position: absolute;
}

.card-selected {
	border: solid 3px #5ba01f;
	border-radius: 5px;
}

.card {
	border: solid 3px #eaeae7;
	border-radius: 5px;
}

.container-card {
   padding-left: 3px;
   display: flex;
   justify-content: space-around;
   align-items: center;
}




</style>

<template>
	<div class="templates">
		<div class="template-img"  v-for="template_style in templates_style" @click="selected = template_style.id">
			<div  :class="selected == template_style.id ? 'card-selected': 'card' " >
				<img :src="$Config.base_url+template_style.small_image" />
				<div class="container-card">
					{{ template_style.name }}
					<i class="fa fa-caret-down"></i>
				</div>
				<div v-if="selected == template_style.id" class="check-container"><i class="fa fa-check" ></i></div> 
			</div>
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
