<template>
    <Head>
        <title>inertia</title>
        <meta
            name="description"
            head-key="description"
            content="About page of the Inertia.js + Vue.js app"
        />
    </Head>
    <div class="main-layout">
        <header class="main-header bg-white shadow-md">
            <slot name="navbar">
                <nav class="navbar px-6 py-4">
                    <div
                        class="flex justify-between items-center max-w-7xl mx-auto"
                    >
                        <div>
                            <Link
                                :href="route('home')"
                                class="text-xl font-bold text-blue-600 hover:text-blue-800"
                            >
                                Inertia Vue App
                            </Link>
                        </div>

                        <div>
                            <ul class="flex items-center gap-6">
                                <template v-if="!$page.props.auth.user">
                                    <li>
                                        <Link
                                            :href="route('register')"
                                            class="text-gray-700 hover:text-blue-600"
                                        >
                                            Register
                                        </Link>
                                    </li>
                                    <li>
                                        <Link
                                            :href="route('login')"
                                            class="text-gray-700 hover:text-blue-600"
                                        >
                                            Login
                                        </Link>
                                    </li>
                                </template>

                                <template v-else>
                                    <li>
                                        <Link
                                            :href="route('logout')"
                                            as="button"
                                            method="post"
                                            class="text-red-600 hover:text-red-800"
                                        >
                                            Log out
                                        </Link>
                                    </li>
                                    <li>
                                        <Link :href="route('dashboard')"
                                        class="text-gray-700 hover:text-blue-600">
                                           Dash Board
                                        </Link>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>
                </nav>
            </slot>
        </header>

        <main class="main-content">
            <slot />
        </main>
        <footer class="main-footer">
            <slot name="footer">
                <p>
                    &copy; {{ new Date().getFullYear() }} inertia js with vue &
                    laravel
                </p>
            </slot>
        </footer>
    </div>
</template>

<script setup></script>

<style scoped>
.main-layout {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
.main-header {
    background: #222;
    color: #fff;
    padding: 1rem;
}
.main-content {
    flex: 1;
    padding: 2rem;
    background: #f9f9f9;
}
.main-footer {
    background: #222;
    color: #fff;
    text-align: center;
    padding: 1rem;
}
.navbar ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}
.navbar li {
    margin-right: 20px;
}
.navbar a {
    color: #fff;
    text-decoration: none;
}
.navbar a:hover {
    text-decoration: underline;
}
</style>
