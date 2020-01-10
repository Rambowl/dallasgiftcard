<template>
	<div class="dropdown relative">
		<!-- trigger -->
		<div class="dropdown-toggle" 
			aria-haspop="true"
			:aria-expanded="isOpen"
			@click.prevent="isOpen = !isOpen">
			<slot name="trigger"></slot>
		</div>

		<!-- menu links -->
		<div class="dropdown-menu absolute bg-card mt-2 py-2 rounded shadow-xl bg-gray-300 text-blue-700 no-underline"
			:class="align === 'left' ? 'left-0' : 'right-0'"
			:style="{ width }"
			v-show="isOpen">
			<slot></slot>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			width: { default: 'auto' },
			align: { default: 'left' }
		},

		data() {
			return { 
				isOpen: false 
			}
		},

		watch: {
			isOpen(isOpen) {
				if (isOpen) {
					document.addEventListener('click', this.closeIfClickedOutside);
				}
			}
		},

		methods: {
			closeIfClickedOutside(event) {
				if (!event.target.closest('.dropdown')) {
					this.isOpen = false;

					document.removeEventListener('click', this.closeIfClickedOutside);
				}
			}
		}	
	}
</script>
