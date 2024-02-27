<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import vue3StarRatings from "vue3-star-ratings";

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
    <section class="container marginTopHalf">
        <div class="row mb-5 colorBlueish">
            <h1>
                {{ $t("bestSellingProducts.title") }}
            </h1>
        </div>
        <article class="row">
            <article class="col-md-4 d-flex flex-column align-items-center mt-4"
                v-for="product in products.filter((bs) => bs.bestSelling === 1)">
                <Link type="button" as="button" :href="$route('product', product.name)">
                <img :src="product.imageUrl" :alt="locale == 'en' ? 'Product image' : 'صورة المنتج'"
                    class="mb-3 mx-auto rounded-circle bestsellingImg sliderImg" width="200" height="200" loading="lazy" />
                </Link>

                <p class="text-center">
                    <a href="#" class="fs-5 colorBlueish">
                        {{ locale === "en" ? product.name : product.nameAr }}</a>
                <div class="d-flex my-3 justify-content-center">
                    <vue3-star-ratings :disableClick="true" starSize="20" v-model="product.rate" dir="ltr" />
                </div>
                </p>
            </article>
        </article>
    </section>
    <!-- Bestsaler Product End -->
</template>
