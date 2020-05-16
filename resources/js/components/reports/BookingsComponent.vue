<template>
	
</template>
<script>
	import { Line } from 'vue-chartjs';

	export default {
		extends: Line,
		mounted(){
			let uri = '';
			let lables = new Array();
			axios.get(uri).then((response)=>{
				let data = response.data;
				if(data){
					data.forEach(element =>{
						label.push(element.label) // this label in the braces come from the database
					})
					this.renderElement()
				}
			})
		}
	}
</script>