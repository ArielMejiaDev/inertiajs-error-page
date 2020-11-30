<template>
    <div class="flex flex-col md:flex-row min-h-screen">

        <div class="w-full md:w-1/2 bg-white flex items-center justify-center">
            <div class="max-w-sm m-8">
                <div class="text-gray-800 text-5xl md:text-6xl font-black">{{ status }}</div>
                <div class="w-16 h-1 bg-pink my-3 md:my-6"></div>
                <p class="text-gray-600 text-2xl md:text-3xl font-light mb-8 leading-normal">{{ message }}</p>
                <button type="button" @click="redirectToHome" class="bg-transparent text-gray-700 font-bold uppercase tracking-wide py-3 px-6 border-2 border-gray-400 hover:border-gray-500 rounded-lg focus:outline-none">Go Home</button>

            </div>
        </div>

        <div class="w-full md:w-1/2">
            <img :src="illustration" class="object-cover h-full" alt="illustration">
        </div>

    </div>
</template>

<script>
export default {
    name: 'Error',
    props: {
        status: Number,
        message: String,
        home: String,
    },
    computed: {
        title() {
            return {
                503: '503: Service Unavailable',
                500: '500: Server Error',
                404: '404: Page Not Found',
                403: '403: Forbidden',
            }[this.status]
        },
        description() {
            return {
                503: 'Sorry, we are doing some maintenance. Please check back soon.',
                500: 'Whoops, something went wrong on our servers.',
                404: 'Sorry, the page you are looking for could not be found.',
                403: 'Sorry, you are forbidden from accessing this page.',
            }[this.status]
        },
        illustration() {
            const notAllowedCodes = [401, 403, 419, 429];
            if(notAllowedCodes.includes(this.status)) {
                return `${this.home}/svg/403.svg`;
            }
            return `${this.home}/svg/${this.status}.svg`;
        }
    },
    methods: {
        redirectToHome() {
            return window.location.href = this.home;
        }
    }
}
</script>
