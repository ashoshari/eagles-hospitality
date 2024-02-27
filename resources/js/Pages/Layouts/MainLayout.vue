<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
</script>

<template>
    <main>
        <Header />
        <section>
            <slot />
        </section>
        <Footer />
        <a
            class="whatsapp"
            href="https://wa.me/966540349846?text=Send20%a20%quote"
            target="_blank"
            ><i class="fa-brands fa-whatsapp fa-2xl"></i
        ></a>
    </main>
</template>
