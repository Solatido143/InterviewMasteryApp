<script setup>
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Interview Mastery" />

    <div
        class="min-h-screen bg-gradient-to-br from-sky-100 to-blue-200 flex items-center justify-center p-6"
    >
        <div
            class="bg-white rounded-2xl shadow-lg max-w-md w-full text-center p-8"
        >
            <h1 class="text-3xl font-bold mb-4 text-blue-800">
                🧠 Interview Mastery
            </h1>
            <p class="text-gray-700 mb-6">
                Sharpen your technical skills with 50+ handpicked questions.
            </p>

            <Link
                href="/quiz"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition"
            >
                Start Quiz
            </Link>
        </div>
    </div>
</template>
