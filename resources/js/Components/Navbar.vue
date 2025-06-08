<script setup>
import NavLink from "@/Components/NavLink.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

import { usePage, Link } from "@inertiajs/vue3";

const { url } = usePage();

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <nav class="fixed top-0 left-0 w-full bg-white border-gray-200">
        <div
            class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
        >
            <a href="#" class="flex items-center space-x-3">
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap"
                    >Upskill Mastery</span
                >
            </a>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white"
                >
                    <li>
                        <NavLink href="/" :active="url === '/'">Home</NavLink>
                    </li>
                    <li>
                        <NavLink href="/quiz" :active="url === '/quiz'"
                            >Quiz</NavLink
                        >
                    </li>
                </ul>
            </div>
            <div v-if="canLogin" class="flex gap-3">
                <Link v-if="$page.props.auth.user" href="/dashboard">
                    <PrimaryButton>Dashboard</PrimaryButton>
                </Link>
                <template v-else>
                    <Link href="/login">
                        <PrimaryButton>Login</PrimaryButton>
                    </Link>

                    <Link v-if="canRegister" href="/register">
                        <SecondaryButton>Register</SecondaryButton>
                    </Link>
                </template>
            </div>
            <button
                data-collapse-toggle="navbar-default"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default"
                aria-expanded="false"
            >
                <span class="sr-only">Open main menu</span>
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
            </button>
        </div>
    </nav>
</template>

<style scoped></style>
