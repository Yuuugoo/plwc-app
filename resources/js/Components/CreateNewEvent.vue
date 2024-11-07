<template>
    <div class="mx-auto max-w-2xl">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a New Church Event</h2>
        <form @submit.prevent="submitForm" enctype="multipart/form-data">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <!-- Event Name -->
                <div class="sm:col-span-2">
                    <label for="event_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Name</label>
                    <input 
                        type="text" 
                        v-model="form.event_name" 
                        name="event_name" 
                        id="event_name" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                        placeholder="Type Church Event's Name"
                        required
                    >
                </div>
                <!-- Event Type -->
                <div>
                    <label for="event_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Type</label>
                    <select 
                        id="event_type" 
                        v-model="form.event_type" 
                        name="event_type" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required
                    >
                        <option value="">Select Event Type</option>
                        <option value="Church Main Events">Main Event</option>
                        <option value="Elementary">Elementary</option>
                        <option value="Highschool - 1st Year College">Highschool - 1st Year College</option>
                        <option value="2nd Year College - 3rd Year College">2nd Year College - 3rd Year College</option>
                        <option value="4th Year College">4th Year College</option>
                        <option value="Youth">Youth</option>
                        <option value="Parents">Parents</option>
                    </select>
                </div>
                <!-- Event Description -->
                <div class="sm:col-span-2">
                    <label for="event_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Description</label>
                    <textarea 
                        id="event_description" 
                        v-model="form.event_description" 
                        name="event_description" 
                        rows="8" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                        placeholder="Enter Event Description"
                        required
                    ></textarea>
                </div>
            </div>
            <!-- Multiple Image Upload (Dropzone) -->
            <div class="mt-5">
                <div 
                @drop.prevent="handleFileDrop"
                @dragover.prevent="dragover = true"
                @dragleave.prevent="dragover = false"
                :class="{'bg-gray-100 dark:bg-gray-600': dragover}"
                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                >
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-full">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
                    </div>
                    <input 
                    id="dropzone-file" 
                    type="file" 
                    class="hidden" 
                    multiple
                    @change="handleFileUpload"
                    />
                </label>
                </div>
                <div v-if="form.event_images.length > 0" class="mt-4">
                <h3 class="text-lg font-semibold mb-2">Uploaded Files:</h3>
                <ul class="list-disc pl-5">
                    <li v-for="(file, index) in form.event_images" :key="index" class="text-sm text-gray-600 dark:text-gray-300">
                    {{ file.name }} ({{ formatFileSize(file.size) }})
                    </li>
                </ul>
                </div>
            </div>
            <!-- Submit Button -->
            <button 
                type="submit" 
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
            >
                Add New Event
            </button>
        </form>
    </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        event_name: '',
        event_type: '',
        event_description: '',
        event_images: [],
      },
      dragover: false,
    };
  },
  methods: {
    submitForm() {
      const formData = new FormData();
      formData.append('event_name', this.form.event_name);
      formData.append('event_type', this.form.event_type);
      formData.append('event_description', this.form.event_description);
      this.form.event_images.forEach((image, index) => {
        formData.append(`event_images[${index}]`, image);
      });
      this.$inertia.post(route('gallery.store'), formData, {
        forceFormData: true,
        preserveFiles: true,
      });
    },
    handleFileUpload(event) {
      this.addFiles(event.target.files);
    },
    handleFileDrop(event) {
      this.dragover = false;
      this.addFiles(event.dataTransfer.files);
    },
    addFiles(fileList) {
      const newFiles = Array.from(fileList);
      this.form.event_images = [...this.form.event_images, ...newFiles];
    },
    formatFileSize(bytes) {
      if (bytes === 0) return '0 Bytes';
      const k = 1024;
      const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
      const i = Math.floor(Math.log(bytes) / Math.log(k));
      return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    },
  },
};
</script>