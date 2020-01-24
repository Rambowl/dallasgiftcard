<!-- used for adding AND updating a New Business -->
<template>
	<modal name="new-business" class="flex" width="720px" height="auto" @before-open="prevData">
		<form @submit.prevent="submit">
			<div class="flex flex-col bg-gray-300 border border-gray-500 pl-4 pr-4 pt-2">
				<div class="text-3xl pt-6 pb-6">
					<h1>Your Business Information</h1>
				</div>

				<div class="mb-4">
					<div class="flex">
						<label for="business_name" class="text-xl mb-2 ml-1 w-1/2">Business Name</label>
						<label for="email" class="text-xl mb-2 w-1/2">Business E-Mail Address</label>
					</div>
					<div class="flex">
						<div class="flex flex-col mr-2 w-1/2">
							<input type="text"
								class="border rounded p-1" 
								:class="form.errors.business_name ? 'border-red-600' : 'border-gray-500'"
								name="business_name"
								value=""
								v-model="form.business_name"
								@keydown="delete form.errors.business_name">
							<span class="text-xs italic text-red-600" v-if="form.errors.business_name" v-text="form.errors.business_name[0]"></span>
						</div>
						<div class="flex flex-col mr-2 w-1/2">
							<input type="text" 
								name="email" 
								class ="border rounded p-1"
								:class="form.errors.email ? 'border-red-600' : 'border-gray-500'"
								value=""
								v-model="form.email"
								@keydown="delete form.errors.email">
							<span class="text-xs italic text-red-600" v-if="form.errors.email" v-text="form.errors.email[0]"></span>
						</div>
					</div>
				</div>
				<div class="mb-4">
					<div class="flex">
						<label for="address_1" class="flex flex-col text-xl mb-2 ml-1 w-1/2">Address Line 1</label>
						<label for="address_2" class="flex flex-col text-xl mb-2 ml-1 w-1/2">Address Line 2</label>
					</div>
					<div class="flex">
						<input 
							name="address_1" 
							type="text" 
							class="border rounded p-1 w-1/2 mr-2"
							:class="form.errors.address_1 ? 'border-red-600' : 'border-gray-500'"
							value=""
							v-model="form.address_1"
							@keydown="delete form.errors.address_1">

						<input 
							name="address_2" 
							type="text" 
							class="border border-gray-500 rounded p-1 w-1/2" 
							value=""
							v-model="form.address_2">
					</div>

					<span class="text-xs italic text-red-600" v-if="form.errors.address_1" v-text="form.errors.address_1[0]"></span>
				</div>
			<div class="mb-4">
				<div class="flex">
					<label for="city" class="flex flex-col text-xl mb-2 ml-1 w-1/3">City</label>
					<label for="state" class="flex flex-col text-xl mb-2 ml-1 w-1/3">State</label>
					<label for="zip_code" class="flex flex-col text-xl mb-2 ml-1 w-1/3">Zip Code</label>
				</div>
				<div class="flex">
					<div class="flex flex-col mr-2 w-1/3">
						<input 
							name="city" 
							type="text" 
							class ="border rounded p-1" 
							:class="form.errors.city ? 'border-red-600' : 'border-gray-500'"
							value="" 
							v-model="form.city">
							<span class="text-xs italic text-red-600" 
							v-if="form.errors.city" 
							v-text="form.errors.city[0]"
							@keydown="delete form.errors.city"></span>
					</div>
					<div class="flex flex-col mr-2 w-1/3">
						<input name="state" 
							type="text" 
							class ="border rounded p-1" 
							:class="form.errors.state ? 'border-red-600' : 'border-gray-500'"
							value="" 
							v-model="form.state"
							@keydown="delete form.errors.state">
							<span class="text-xs italic text-red-600" 
							v-if="form.errors.state" 
							v-text="form.errors.state[0]"></span>
					</div>
					<div class="flex flex-col mr-2 w-1/3">
						<input name="zip_code" 
							type="text" 
							class ="border rounded p-1" 
							:class="form.errors.zip_code ? 'border-red-600' : 'border-gray-500'"
							value="" 
							v-model="form.zip_code"
							@keydown="delete form.errors.zip_code">
							<span class="text-xs italic text-red-600" 
							v-if="form.errors.zip_code" 
							v-text="form.errors.zip_code[0]"></span>
					</div>
				</div>
			</div>
			<div class="mb-4">
				<div class="flex">
					<label for="phone_1" 
						class="flex flex-col text-xl mb-2 ml-1 w-1/3">Primary Phone #</label>
					<label for="phone_2" 
						class="flex flex-col text-xl mb-2 ml-1 w-1/3">Secondary Phone #</label>
					<label for="fax" 
						class="flex flex-col text-xl mb-2 ml-1 w-1/3">Fax #</label>
				</div>
				<div class="flex">
					<div class="flex flex-col mr-2 w-1/3">
						<input 
							type="tel" 
							name="phone_1" 
							pattern="[0-9]{10}"
							placeholder="1234567890"
							class ="border rounded p-1"
							:class="form.errors.phone_1 ? 'border-red-600' : 'border-gray-500'"
							value="" 
							v-model="form.phone_1"
							@keydown="delete form.errors.phone_1">

						<span 
							class="text-xs italic text-red-600" 
							v-if="form.errors.phone_1" 
							v-text="form.errors.phone_1[0]"></span>
					</div>
					<div class="flex flex-col mr-2 w-1/3">
						<input 
							type="tel" 
							name="phone_2" 
							pattern="[0-9]{10}" 
							placeholder="1234567890"
							class ="border rounded p-1"
							:class="form.errors.phone_2 ? 'border-red-600' : 'border-gray-500'"
							value="" 
							v-model="form.phone_2"
							@keydown="delete form.errors.phone_2">
						<span 
							class="text-xs italic text-red-600" 
							v-if="form.errors.phone_2" 
							v-text="form.errors.phone_2[0]"></span>
					</div>
					<div class="flex flex-col mr-2 w-1/3">
						<input 
							type="tel" 
							name="fax" 
							pattern="[0-9]{10}" 
							placeholder="1234567890"
							class ="border rounded p-1"
							:class="form.errors.fax ? 'border-red-600' : 'border-gray-500'"
							value="" 
							v-model="form.fax"
							@keydown="delete form.errors.fax">
						<span 
							class="text-xs italic text-red-600" 
							v-if="form.errors.fax" 
							v-text="form.errors.fax[0]"></span>
					</div>
				</div>
			</div>
			<div class="mb-4">
				<label 
					for="website" 
					class="flex flex-col text-xl mb-2 ml-1">Website</label>
				<input 
					type="text" 
					name="website" 
					placeholder="www.mybusinesswebsite.com" 
					class="border rounded p-1 mr-2 w-full"
					:class="form.errors.website ? 'border-red-600' : 'border-gray-500'"
					value="" 
					v-model="form.website">

				<span class="text-xs italic text-red-600" v-if="form.errors.website" v-text="form.errors.website[0]"></span>
			</div>
			<div class="mb-4">
				<label for="description" class="flex flex-col text-xl mb-2 ml-1">Brief Description Of Your Business</label>
				<textarea type="text" name="description" class ="border border-gray-500 rounded p-1 mr-2 w-full" v-model="form.description"></textarea>

				<span class="text-xs italic text-error" v-if="form.errors.description" v-text="form.errors.description[0]"></span>
			</div>

			<footer class="flex justify-end mt-2 mb-2">
				<button type="button" class="button border border-blue-600 block rounded py-2 px-5 bg-white text-blue-600 mr-4" @click="resetAndCancel">Cancel</button>
				<button type="submit" class="button border border-blue-700 block rounded py-2 px-5 bg-blue-600 text-blue-100" v-text="subText" :disabled="submitted"></button>
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
					business_name: '',
					address_1: '',
					address_2: '',
					city: '',
					state: '',
					zip_code: '',
					phone_1: '',
					phone_2: '',
					fax: '',
					email: '',
					website: '',
					description: '',
				}),
				subText: '',
				submitted: false
			}
		},
		methods: {
			resetAndCancel() {
				this.submitted = false;

				this.form.reset();
				this.$modal.hide('new-business');
			},
			prevData(event) {
				//reset the form; in case adding
				this.form.reset();

				//if there are events, get data for editing
				if (event.params !== undefined) {
					this.form.business_name = event.params.business_name;	
					this.form.address_1 = event.params.address_1;	
					this.form.address_2 = event.params.address_2;	
					this.form.city = event.params.city;	
					this.form.state = event.params.state;	
					this.form.zip_code = event.params.zip_code;	
					this.form.phone_1 = event.params.phone_1;	
					this.form.phone_2 = event.params.phone_2;	
					this.form.fax = event.params.fax;	
					this.form.email = event.params.email;	
					this.form.website = event.params.website;	
					this.form.description = event.params.description;
					this.id = event.params.business_id;
					this.subText = "Update";
				}
				//else this is creating a new business
				else {
					this.subText = "Create";
				}
			},
			async submit() {
				this.submitted = true;

				if (this.subText === "Create") {
					this.form.submit('/businesses')
						.then(response => location = response.data.message);
				}
				else if (this.subText === "Update") {
					this.form.put('/businesses/' + this.id).then(response => location = response.data.message);
				}
				
			}
		}
	}
</script>