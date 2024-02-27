<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted, computed } from "vue";

const locale = ref(localStorage.getItem("locale"));
const search = defineModel();

onMounted(() => {
    window.addEventListener("locale-changed", (event) => {
        locale.value = event.detail.storage;
    });
});

const props = defineProps({
    products: Object,
});

const filteredProducts = computed(() => {
    return props.products.filter((product) =>
        product?.name
            ?.toLowerCase()
            .includes(search?.value?.toLowerCase() || "")
    );
});
</script>

<template>
    <!-- <Head :title="locale == 'en'? 'Shop' : 'المتجر'" /> -->

    <Head>
        <title>{{ locale == 'en'? 'Shop' : 'المتجر' }}</title>
        <meta name="description" content="Your page description">

    </Head>
    <section class="container py-5 marginTopHalf">
        <section class="container-fluid py-5">
            <form class="row mb-5 justify-content-center">
                <form class="col-12 col-md-6">
                    <p class="input-group">
                        <input
                            class="form-control border-end-0 border rounded-pill"
                            type="search"
                            :placeholder="locale == 'en'? 'Search a product..' : 'إبحث عن منتج..'"
                            id="example-search-input"
                            v-model="search"
                        />
                    </p>
                </form>
            </form>
            <section class="row g-4">
                <section
                    v-for="product in filteredProducts"
                    class="col-12 col-md-6 col-xl-4 text-center"
                >
                    <Link
                        type="button"
                        as="button"
                        :href="$route('product', product.name)"
                    >
                        <img :src="product.imageUrl"
                        loading="lazy"
                        :alt="locale == 'en'? 'Product image' : 'صورة المنتج'"
                        class="shopImg" width="400" height="450"/>
                    </Link>

                    <p class="p-4 border border-top-0 rounded-bottom">
                        <h4 class="colorBlueish text-center text-break">
                            {{
                                locale === "en" ? product.name : product.nameAr
                            }}
                        </h4>
                        <p class="text-break">
                            {{
                                locale === "en"
                                    ? product.description
                                    : product.descriptionAr
                            }}
                        </p>
                    </p>
                </section>
            </section>
        </section>
    </section>
</template>
