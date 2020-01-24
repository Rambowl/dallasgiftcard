class FormJS {
	constructor(data) {
		this.originalData = JSON.parse(JSON.stringify(data));

		Object.assign(this, data);

		this.errors = {};

		this.submitted = false;
	}

	data() {
		// { title: '' }
		return Object.keys(this.originalData).reduce((data, attribute) => {
			data[attribute] = this[attribute];

			return data;
		}, {});
	}

	post(endpoint) {
		this.submit(endpoint);
	}

	put(endpoint) {
		//this.submit(endpoint, 'put');		//form.patch will do a patch request
		return axios.put(endpoint, this.data())
			.catch(this.onFail.bind(this))
			.then(this.onSuccess.bind(this));
	}

	delete(endpoint) {
		this.submit(endpoint, 'delete');		//form.delete will do a delete request
	}

	submit(endpoint, requestType = 'post') {
		return axios[requestType](endpoint, this.data())
			.catch(this.onFail.bind(this))
			.then(this.onSuccess.bind(this));
	}

	onSuccess(response) {
		this.submitted = true;
		this.errors = {};

		return response;
	}

	onFail(error) {
		this.errors = error.response.data.errors;
		this.submitted = false;

		throw error;		
	}

	reset() {
		Object.assign(this, this.originalData);
		this.errors = {};
	}
}

export default FormJS;