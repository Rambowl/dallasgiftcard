<template>
	<modal name="new-campaign" class="flex" width="720px" height="auto" @before-open="getBusinesses">
		<form 
			@submit.prevent="submit"
			@keydown="submitted = false">
			<div class="flex flex-col bg-gray-300 border border-gray-500 pl-4 pr-4 pt-2">
				<div class="text-3xl pt-6 pb-6">
					<h1>Create a Campaign</h1>
				</div>
				<div class="control flex mb-5 items-center">
					<label for="type" class="text-xl mb-2 mr-3">Campaign Type:</label>
					<select name="type" class="p-2 border border-blue-700" v-model="form.type">
						<option value="Newsletter">Newsletter</option>
						<option value="Buy Now">Buy Now</option>
						<option value="Subscription">Subscription</option>
						<option value="Promotion">Promotion</option>
					</select>


					<label for="businesses_select" class="text-xl mb-2 ml-8 mr-3">For Business:</label>
					<select name="business_id" class="p-2 border border-blue-700" v-model="form.business_id">
						<option v-for="business in businesses" :value="business.id">{{ business.business_name }}</option>
					</select>
				</div>

				<div class="control mb-4">
				<label for="title" class="flex flex-col text-xl mb-2">Campaign Title</label>
				<input type="text" 
					id="title" 
					name="title" 
					class="border border-gray-500 rounded p-1 w-full"
					:class="form.errors.title ? 'border-error' : 'border-muted-light'"
					v-model="form.title">
					<span id="title_error" class="text-xs italic text-red-500" v-if="form.errors.title" v-text="form.errors.title[0]"></span>
			</div>
			<div class="control mb-4">
				<label for="description" class="flex flex-col text-xl mb-2">Description</label>
				<textarea 
					id="description" 
					name="description" 
					class="textarea border border-gray-500 rounded p-1 w-full" 
					:class="form.errors.description ? 'border-error' : 'border-muted-light'"
					rows="3"
					v-model="form.description"></textarea>
					<span id="desc_error" class="text-xs italic text-red-500" v-if="form.errors.description" v-text="form.errors.description[0]"></span>
			</div>	

			<footer class="flex justify-end mt-2 mb-2">
				<button type="button" class="button border border-blue-600 block rounded py-2 px-5 bg-white text-blue-600 mr-4" @click="resetAndCancel">Cancel</button>
				<button type="submit" class="button border border-blue-700 block rounded py-2 px-5 bg-blue-600 text-blue-100" :disabled="submitted">Submit</button>
			</footer>		
			</div>
		</form>
	</modal>
</template>

<script>
	import FormJS from "./FormJS";

	export default {
		data() {
			return {
				form: new FormJS({
					type: '',
					title: '',
					description: '',
					user_id: '',
					business_id: ''
				}),
				businesses: '',
				subText: '',
				submitted: false
			}
		},
		methods: {
			getBusinesses(event) {
				//parse data using JSON
				this.businesses = JSON.parse(event.params.businesses);
				this.form.type = "Newsletter";
				this.form.business_id = this.businesses[0].id;
				
			},
			resetAndCancel() {
				this.form.reset();
				this.$modal.hide('new-campaign');
			},
			async submit() {
				this.submitted = true;

				this.form.submit('/campaigns')
					.then(response => location = response.data.message);
			}
		},
	}
</script>