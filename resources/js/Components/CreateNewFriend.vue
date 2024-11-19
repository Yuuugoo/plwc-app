<template>
    <div class="mx-auto max-w-2xl">
        <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new friend</h2>
        <form @submit.prevent="submitForm" enctype="multipart/form-data">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Full Name</label>
                    <input 
                        type="text" 
                        v-model="form.name" 
                        name="name" 
                        id="name" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                        placeholder="Type Friend's Name"
                        required
                    >
                </div>
                <div>
                    <label for="grade_level" class="block mb-2 text-sm font-medium text-gray-900">Grade Level</label>
                    <select 
                        id="grade_level" 
                        v-model="form.grade_level" 
                        name="grade_level" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                        required
                    >
                        <option value="">Select Grade Level</option>
                        <option value="Elementary">Elementary</option>
                        <option value="Highschool - 1st Year College">Highschool - 1st Year College</option>
                        <option value="2nd Year College - 3rd Year College">2nd Year College - 3rd Year College</option>
                        <option value="4th Year College">4th Year College</option>
                    </select>
                </div>
                <div class="sm:col-span-2">
                    <label for="introduction_content" class="block mb-2 text-sm font-medium text-gray-900">Introduction</label>
                    <textarea 
                        id="introduction_content" 
                        v-model="form.introduction_content" 
                        name="introduction_content" 
                        rows="8" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" 
                        placeholder="Enter New Friend Introduction"
                        required
                    ></textarea>
                </div>
            </div>
            <div class="mt-5">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="friend_avatar">Upload file</label>
                <input 
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" 
                aria-describedby="friend_avatar_help" 
                id="friend_avatar" 
                name="friend_avatar"
                type="file" 
                @change="handleFileUpload"
                >
                <div class="mt-1 text-sm text-gray-500" id="friend_avatar_help">Upload Picture of New Friend</div>
            </div>
            <button 
                type="submit" 
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-600 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800"
            >
                Add New Friend
            </button>
        </form>
    </div>
</template>

<script>
export default {
data() {
    return {
    form: {
        name: '',
        grade_level: '',
        introduction_content: '',
        friend_avatar: null, 
    },
    };
},
methods: {
    submitForm() {
    this.$inertia.post(route('new-friends.store'), this.form, {
        preserveFiles: true,
        preserveState: false,
        preserveScroll: true,
    });
    },
    handleFileUpload(event) {
    this.form.friend_avatar = event.target.files[0];
    },
},
};
</script>