<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <section class="d-flex align-items-center justify-content-center vh-100">
        <div class="text-center">
            <p class="lead">
                No products matched your search criteria. Check for typos.
            </p>
            <Link
                type="button"
                as="button"
                :href="$route('home')"
                class="btn text-white bgBlueish hoverColorBlueish"
                >Go Home</Link
            >
        </div>
    </section>
</template>
