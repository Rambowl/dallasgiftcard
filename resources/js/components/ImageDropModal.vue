<template>
	<modal name="upload-image">
		
		<h3>Upload Your Business Logo</h3>
	    <ul>
	        <li>File formats: PNG, JPG</li>
	        <li>Recommended size: 600px * 600px</li>
	        <li>Max. Size: 3MB</li>
	        <li>Only one image may be uploaded</li>
	    </ul>
	    <form action="{{ $business->path() . '/images' }}"
	        class="dropzone"
	        method="POST"
	        id="my-awesome-dropzone">
	    
	        <span class="text-red-600 text-sm mt-2 italic">{{ $errors->first('file.message') }}</span>  
	    </form>		  
	</modal>
</template>

<script>
	Dropzone.options.myAwesomeDropzone =
     {
        maxFilesize: 3,
        acceptedFiles: ".jpeg,.jpg,.png",
        addRemoveLinks: true,
        maxFiles: 1,
        timeout: 5000,
        success: function(file, response) 
        {
            console.log(response);

            return window.location.replace("../../../businesses");
        },
        error: function(file, response)
        {
            if (file.size >= 3*1024*1024) {
             alert("File was Larger than 3Mb!");
            }
            console.log(file.size);
           return false;
        }
    };

	export default {

	}
</script>