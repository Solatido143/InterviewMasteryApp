<script setup>
import NavLink from "@/Components/NavLink.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

import { usePage, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const { url } = usePage();
const showingNavigationDropdown = ref(false);

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
            <a href="/" class="flex items-center space-x-3">
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
                    <li>
                        <NavLink href="/create" :active="url === '/create'"
                            >Create</NavLink
                        >
                    </li>
                </ul>
            </div>
            <div class="hidden w-full md:block md:w-auto">
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
            </div>
            <div class="-me-2 flex items-center sm:hidden">
                <button
                    @click="
                        showingNavigationDropdown = !showingNavigationDropdown
                    "
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                >
                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            :class="{
                                hidden: showingNavigationDropdown,
                                'inline-flex': !showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                        <path
                            :class="{
                                hidden: !showingNavigationDropdown,
                                'inline-flex': showingNavigationDropdown,
                            }"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </div>

        <div
            :class="{
                block: showingNavigationDropdown,
                hidden: !showingNavigationDropdown,
            }"
            class="sm:hidden"
        >
            <div
                v-if="$page.props.auth.user"
                class="space-y-1 pb-3 pt-2 ring-2"
            >
                <ResponsiveNavLink
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                >
                    Dashboard
                </ResponsiveNavLink>
                <ResponsiveNavLink
                    :href="route('home')"
                    :active="route().current('home')"
                >
                    Home
                </ResponsiveNavLink>
                <ResponsiveNavLink
                    :href="route('quiz')"
                    :active="route().current('quiz')"
                >
                    Quiz
                </ResponsiveNavLink>
            </div>

            <div v-else class="space-y-1 pb-3 pt-2 ring-2">
                <ResponsiveNavLink
                    :href="route('home')"
                    :active="route().current('home')"
                >
                    Home
                </ResponsiveNavLink>
                <ResponsiveNavLink
                    :href="route('quiz')"
                    :active="route().current('quiz')"
                >
                    Quiz
                </ResponsiveNavLink>
            </div>

            <!-- Responsive Settings Options -->
            <div
                v-if="$page.props.auth.user"
                class="border-t border-gray-200 pb-1 pt-4"
            >
                <div class="px-4">
                    <div class="text-base font-medium text-gray-800">
                        {{ $page.props.auth.user.name }}
                    </div>
                    <div class="text-sm font-medium text-gray-500">
                        {{ $page.props.auth.user.email }}
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <ResponsiveNavLink :href="route('profile.edit')">
                        Profile
                    </ResponsiveNavLink>
                    <ResponsiveNavLink
                        :href="route('logout')"
                        method="post"
                        as="button"
                    >
                        Log Out
                    </ResponsiveNavLink>
                </div>
            </div>
            <div v-else class="border-y-4 border-red-50">
                <ResponsiveNavLink href="/login">Login</ResponsiveNavLink>
                <ResponsiveNavLink v-if="canRegister" href="/register"
                    >Register</ResponsiveNavLink
                >
            </div>
        </div>
    </nav>
</template>

<style scoped>
#burger-button {
    padding-left: 0.5rem;
    padding-right: 0.5rem;
}
</style>
