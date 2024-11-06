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
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG, or GIF</p>
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

            <!-- Uploaded Files List with Progress Bars -->
            <div v-if="uploadedFiles.length > 0" class="mt-4">
                <h3 class="text-lg font-semibold mb-2">Uploaded Files:</h3>
                <div v-for="(file, index) in uploadedFiles" :key="index" class="mb-4">
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-gray-600 dark:text-gray-300">
                            {{ file.name }} ({{ formatFileSize(file.size) }})
                            <span v-if="file.error" class="text-red-500 ml-2">{{ file.error }}</span>
                        </span>
                        <span class="text-sm text-gray-600 dark:text-gray-300">{{ file.progress }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
                        <div 
                            class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full transition-all duration-300" 
                            :style="{ width: `${file.progress}%` }"
                        >
                            {{ file.progress }}%
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <button 
          type="submit" 
          class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800"
          :disabled="isUploading"
        >
          {{ isUploading ? 'Uploading...' : 'Add New Event' }}
        </button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            form: {
                event_name: '',
                event_type: '',
                event_description: '',
                event_images: [],
            },
            uploadedFiles: [],
            dragover: false,
            isUploading: false,
        };
    },
    methods: {
        async uploadFile(file) {
            const uploadId = Date.now() + Math.random().toString(36).substring(7);
            
            const fileObject = {
                id: uploadId,
                name: file.name,
                size: file.size,
                progress: 0,
                error: null,
                uploaded: false
            };
            
            this.uploadedFiles.push(fileObject);
            const fileIndex = this.uploadedFiles.length - 1;
            
            const formData = new FormData();
            formData.append('file', file);
            
            try {
                this.isUploading = true;
                
                // Using the route helper for the upload endpoint
                const response = await axios.post(route('gallery.upload'), formData, {
                    onUploadProgress: (progressEvent) => {
                        if (progressEvent.total) {
                            const percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                            const fileToUpdate = this.uploadedFiles.find(f => f.id === uploadId);
                            if (fileToUpdate) {
                                fileToUpdate.progress = percentCompleted;
                            }
                        }
                    }
                });

                const fileToUpdate = this.uploadedFiles.find(f => f.id === uploadId);
                if (fileToUpdate) {
                    fileToUpdate.progress = 100;
                    fileToUpdate.uploaded = true;
                    this.form.event_images.push(response.data.path);
                }
            } catch (error) {
                console.error('Upload failed:', error);
                const fileToUpdate = this.uploadedFiles.find(f => f.id === uploadId);
                if (fileToUpdate) {
                    fileToUpdate.error = error.response?.data?.message || 'Upload failed';
                    fileToUpdate.progress = 0;
                }
            } finally {
                this.isUploading = false;
            }
        },

        handleFileUpload(event) {
            const files = Array.from(event.target.files);
            files.forEach(file => this.uploadFile(file));
        },

        handleFileDrop(event) {
            this.dragover = false;
            const files = Array.from(event.dataTransfer.files);
            files.forEach(file => this.uploadFile(file));
        },

        async submitForm() {
            try {
                // Only proceed if all files are uploaded
                if (this.uploadedFiles.some(file => !file.uploaded)) {
                    alert('Please wait for all files to finish uploading');
                    return;
                }

                const formData = new FormData();
                formData.append('event_name', this.form.event_name);
                formData.append('event_type', this.form.event_type);
                formData.append('event_description', this.form.event_description);
                
                // Add the uploaded file paths
                this.form.event_images.forEach((path, index) => {
                    formData.append(`event_images[${index}]`, path);
                });

                await this.$inertia.post(route('gallery.store'), formData);
            } catch (error) {
                console.error('Form submission failed:', error);
            }
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
