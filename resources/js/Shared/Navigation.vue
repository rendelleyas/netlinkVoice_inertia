<template>
    <nav class="ml-6">
        <ul class="flex list-none space-x-4 list-inside">
            <li>
                <NavLink href="/" :active="$page.component == 'Home'">
                    Home
                </NavLink>
            </li>
            <li>
                <NavLink href="/users" :active="$page.component == 'Users/Index'">
                    Users
                </NavLink>
            </li>
            <li>
                <NavLink href="/settings" :active="$page.component == 'Settings'">
                    Settings
                </NavLink>
            </li>
            <li>
                <NavLink href="/logout" method="post" as="button">
                    Logout
                </NavLink>
            </li>
        </ul>
   </nav>
</template>
<script setup>
import NavLink from './NavLink.vue';
</script>