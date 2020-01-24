<template>
	<div>
		<a class="text-lg text-white font-bold" 
		@click="$modal.show('contact-support-modal')">Support</a>

		<modal 
			name="contact-support-modal"
			height="auto"
			width="100%"
			:pivotY="1"
			classes="bg-white rounded-none shadow-inner">

			<div class="py-6 container mx-auto">
				<h1 class="text-center text-2xl">Have a Question?</h1>

				<form
					autocomplete="off"
					class="p-8 lg:w-1/2 md:mx-auto text-xl"
					@submit.prevent="contactSupport"
					@keydown="submitted = false">

					<div class="border-b border-b-2 border-blue-400 py-2 px-4">
						<input 
							type="text" 
							name="name"
							class="appearance-none bg-transparent border-none leading-tight focus:outline-none w-full"
							placeholder="What is your name?"
							v-model="message.name"
							@keydown="delete errors.name"
							required>

						
					</div>

					<span 
							class="text-xs text-red-600 pt-2"
							v-text="errors.name[0]"
							v-if="errors.name"></span>

					<div class="border-b border-b-2 border-blue-400 py-2 px-4 mt-4">
						<input 
							type="text" 
							name="email"
							class="appearance-none bg-transparent border-none leading-tight focus:outline-none w-full"
							placeholder="What is your E-Mail address?"
							v-model="message.email"
							@keydown="delete errors.email"
							required>							
					</div>

					<span 
							class="text-xs text-red-600 pt-2"
							v-text="errors.email[0]"
							v-if="errors.email"></span>

					<div class="border-b border-b-2 border-blue-400 py-2 px-4 mt-4">
						<textarea
							name="question"
							class="appearance-none bg-transparent border-none leading-tight focus:outline-none w-full"
							rows="3"
							placeholder="What is your question?"
							v-model="message.question"
							@keydown="delete errors.question"
							required></textarea> 
					</div>

					<span 
						class="text-xs text-red-600 pt-2"
						v-text="errors.question[0]"
						v-if="errors.question"></span>
						
					<div class="border-b border-b-2 border-blue-400 py-2 px-4 mt-4">
						<input 
							type="text" 
							name="verification"
							class="appearance-none bg-transparent border-none leading-tight focus:outline-none w-full"
							placeholder="What is 8 + 7?"
							v-model="message.verification"
							@keydown="delete errors.verification"
							required>

						
					</div>

					<span 
						class="text-xs text-red-600 pt-2"
						v-text="errors.verification[0]"
						v-if="errors.verification"></span>

					<div class="flex mt-6 justify-end text-base">
						<button
							class="button border border-blue-600 block rounded py-2 px-5 bg-white text-blue-600 mr-4" 
							@click="cancel">Cancel</button>
						<button 
							type="submit"
							class="button border border-blue-300 block rounded py-2 px-5 bg-blue-600 text-blue-100" 
							:disabled="submitted">
							Send</button>
					</div>
				</form>
			</div>
		</modal>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				message: {},
				errors: {},
				submitted: false
			}
		},
		methods: {
			cancel() {
				this.$modal.hide('contact-support-modal');

				this.resetForm();
			},
			contactSupport() {
				this.submitted = true;

				axios.post('/contact', this.message)
					.then(() => {
						this.$modal.hide('contact-support-modal');

						this.resetForm();

						Swal.fire(
						  'Thank you!',
						  'We will get back to you soon!',
						  'success'
					  	);
					})
					.catch(errors => {
						this.errors = errors.response.data.errors;
					});
					
			},
			resetForm() {
				this.message = {};
				this.submitted = false;
			}

		}
	};
</script>