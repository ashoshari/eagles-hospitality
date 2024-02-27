<script setup>
import Hero from "./Hero.vue";
import Features from "./Features.vue";
import { Head } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

import ShopByCategory from "./ShopByCategory.vue";
import Features2 from "./Features2.vue";
const locale = ref(localStorage.getItem("locale"));
onMounted(() => {
    window.addEventListener("locale-changed", (event) => {
        locale.value = event.detail.storage;
    });
});
const props = defineProps({
    products: Object,
});
</script>
<template>
    <main>
        <section>

            <Head>
                <title>{{ locale == "en" ? "Home" : "الصفحة الرئيسية" }}</title>
                <meta name="description"
                    content="تجهيزات فندقية ومستلزمات الضيافة، مجموعة واسعة من المنتجات والخدمات التي تلبي احتياجات الفنادق والشقق المفروشة والشاليهات، كل ما يلزم احتياجات النزلاء التي توفر تجربة مريحة ومميزة للنزلاء" />
            </Head>
        </section>
        <section>
            <Hero :products="props.products" />
        </section>
        <section>
            <Features />
        </section>

        <section>
            <ShopByCategory :products="props.products" />
        </section>

        <section>
            <Features2 />
        </section>

        <!--   <section>
            <TodaysDeal :products="props.products" />
        </section>


        <section>
            <Statistics />
        </section> -->
    </main>
</template>
