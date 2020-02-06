<template>
	<div class="flex w-10/12">
		<!-- left side -->
		<div class="bg-gray-300 flex-col border border-gray-500 rounded px-4 mr-3 w-3/4" id="template_selection" v-if="templateNotSelected">
			<h2 class="text-2xl p-2">Choose a template</h2>

			<div class="flex">		
				<div class="p-3">
					<div class="text-center mb-2 font-bold">
						Upload Newsletter
					</div>
					<div class="flex flex-col">
						<img src="/images/template3.png" id="Upload" @click="tempSelected">
					</div>
					
				</div>
				<div class="p-3">
					<div class="text-center mb-2 font-bold">
						Custom Design Online
					</div>
					<div class="flex flex-col">
						<img src="/images/template1.png" id="Design" @click="tempSelected">
					</div>
				</div>
			</div>
		</div>
		<!-- UPLOAD NEWSLETTER -->
		<div id="drop-newsletter" class="bg-gray-300 flex-col border border-gray-500 rounded px-4 mr-3 pb-5 w-3/4" v-else>
			<h3 class="m-3 mb-5 font-bold text-2xl">Upload Your Newsletter</h3>
		    <ul class="mb-3 ml-4">
		        <li class="ml-5 mb-2 list-disc" v-for="dropList in dropLists">{{ dropList.message }}</li>
		    </ul>
		    <div class="flex flex-col justify-center border border-black bg-yellow-200 p-5" @drop.prevent="addFile" @dragover.prevent>
			    <h2 class="flex justify-center pb-4">Files to Upload (Drag them over)</h2>
				<ul>
				    <li v-for="file in files">
				      {{ file.name }} ({{ file.size | kb }} kb) <button @click="removeFile(file)" title="Remove">X</button>
				    </li>
				</ul>	
			    <div class="flex justify-center mt-5">		
				  	<button v-if="uploadDisabled" :disabled="uploadDisabled" class="flex button border block rounded py-2 px-5 bg-blue-300 text-blue-100 opacity-50 cursor-not-allowed">Upload</button>
				  	<button v-else class="flex button border block rounded py-2 px-5 bg-blue-600 text-blue-100" @click="upload">Upload</button>
				</div>
			</div>
		</div>
		
		<!-- right side -->
		<div class="bg-gray-300 flex-col border border-gray-500 rounded px-4 mr-3 w-1/4">		
			<form 
				@submit.prevent="submit"
				id="options" 
				method="POST" 
				action="campaigns">		
				
				<div class="flex justify-between py-5 border-b-2 border-gray-600 w-full">
					<div class="text-3xl italic" v-text="type"></div>
					<div class="flex justify-end">
						<button type="submit" class="flex button border border-blue-600 block rounded py-2 px-5 bg-blue-600 text-blue-100 justify-end">Save</button>
					</div>					
				</div>
				
				<div class="flex flex-col text-2xl mt-5 mb-4">
					<label for="title" class="mb-2">Title</label>
					<input class="border border-gray-500 rounded p-1" v-text="title" v-model="form.title">
				</div>
				<div class="text-xl mb-4">
					<label for="description">Description</label>
					<textarea class="mt-2 border border-gray-500 rounded p-1 w-full" rows="4" v-text="description" v-model="form.description"></textarea>
				</div>
				<div class="text-xl mb-4">
					<label for="template" class="pt-1">Template:</label> 
					<input name="template" id="template"
						class="pl-1 bg-gray-300" 
						v-text="form.template" 
						v-model="form.template" 
						size="14" 
						disabled>
				</div>
				<div class="text-xl mb-4">
					<label for="fileSelected">File:</label>
					<input name="fileSelected" id="fileSelected"
						class="pl-1 bg-gray-300" 
						v-text="form.fileSelected" 
						v-model="form.fileSelected" 
						size="14" 
						disabled>
				</div>
			</form>
		</div>
	</div>
</template>

<script>
	import FormJS from ".././components/FormJS";

	export default {
		props: [ 'id', 'title', 'description', 'type', 'csrf', 'template'],
	  	mounted: function() {
	  		if (this.template == '') {
	  			console.log("it is null");
	  		}
	  		else {
	  			this.templateNotSelected = false;
	  		}
	  	},
		data() {
			return {
				form: new FormJS({
					title: this.title,
					description: this.description,
					template: this.template,
				}),				
				dropLists: [
					{ message: 'File formats: PNG, JPG' },
					{ message: 'Recommended size (W x H): 800px * 600px' },
					{ message: 'Max. Size: 5MB' },
					{ message: 'Only one image may be uploaded' },
				],
				files: [],
				needsSave: false,				//modification was done; database needs saving
				templateNotSelected: true,
				submitted: false
			}
		},
		computed: {
		    uploadDisabled() {
		      return this.files.length === 0;
		    }
		},
		methods: {
			tempSelected(data) {
				//give warning message if user selects Design Online
				if (data.toElement.id == "Design Online") {
					Swal.fire({
					  icon: 'warning',
					  title: 'Oops...',
					  text: 'That feature is not available yet',
					})
				}
				//else choose template
				else {
					//set template
					this.form.template = data.toElement.id;
					this.needsSave = true;
					this.templateNotSelected = false;

					/*axios.put('/campaigns/1', this.form.template) 
						.catch(errors => {
							this.errors = errors.response.data.errors;
					});*/
				}
				
			},

			addFile(e) {
		      let droppedFiles = e.dataTransfer.files;
		      if(!droppedFiles) return;
		      // this tip, convert FileList to array, credit: https://www.smashingmagazine.com/2018/01/drag-drop-file-uploader-vanilla-js/
		      ([...droppedFiles]).forEach(f => {
		        this.files.push(f);
		      });
		    },
		    removeFile(file){
		      this.files = this.files.filter(f => {
		        return f != file;
		      });      
		    },
		    upload() {
		      
		      let formData = new FormData();
		      this.files.forEach((f,x) => {
		        formData.append('file'+(x+1), f);
		      });
		      
		      fetch('https://httpbin.org/post', {
		        method:'POST',
		        body: formData
		      })
		      .then(res => res.json())
		      .then(res => {
		         console.log('done uploading', res);
		      })
		      .catch(e => {
		        console.error(JSON.stringify(e.message));
		      });
		      
		    },
			async submit() {
				this.submitted = true;

				this.form.put('/campaigns/' + this.id)
					.then(response => {
						Swal.fire(
						  'Database Updated!',
						  'Your changes have been saved!',
						  'success');
						this.needsSave = false;
					}
				);
			}
		}
	}
</script>