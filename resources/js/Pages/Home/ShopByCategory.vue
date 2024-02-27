<script setup>
import { Link } from "@inertiajs/vue3";
import vue3StarRatings from "vue3-star-ratings";
const locale = ref(localStorage.getItem("locale"));
import { ref, onMounted } from "vue";

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
    <section class="container-fluid fruite py-5">
        <section class="container py-5">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a
                        class="nav-link colorBlueish fw-bold active"
                        id="simple-tab-0"
                        data-bs-toggle="tab"
                        href="#simple-tabpanel-0"
                        role="tab"
                        aria-controls="simple-tabpanel-0"
                        aria-selected="true"
                    >
                        {{ $t("products.category1") }}
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a
                        class="nav-link colorBlueish fw-bold"
                        id="simple-tab-1"
                        data-bs-toggle="tab"
                        href="#simple-tabpanel-1"
                        role="tab"
                        aria-controls="simple-tabpanel-1"
                        aria-selected="false"
                    >
                        {{ $t("products.category2") }}
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a
                        class="nav-link colorBlueish fw-bold"
                        id="simple-tab-2"
                        data-bs-toggle="tab"
                        href="#simple-tabpanel-2"
                        role="tab"
                        aria-controls="simple-tabpanel-2"
                        aria-selected="false"
                    >
                        {{ $t("products.category3") }}
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a
                        class="nav-link colorBlueish fw-bold"
                        id="simple-tab-3"
                        data-bs-toggle="tab"
                        href="#simple-tabpanel-3"
                        role="tab"
                        aria-controls="simple-tabpanel-3"
                        aria-selected="false"
                    >
                        {{ $t("products.category4") }}
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a
                        class="nav-link colorBlueish fw-bold"
                        id="simple-tab-3"
                        data-bs-toggle="tab"
                        href="#simple-tabpanel-4"
                        role="tab"
                        aria-controls="simple-tabpanel-4"
                        aria-selected="false"
                    >
                        {{ $t("products.category5") }}
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a
                        class="nav-link colorBlueish fw-bold"
                        id="simple-tab-3"
                        data-bs-toggle="tab"
                        href="#simple-tabpanel-5"
                        role="tab"
                        aria-controls="simple-tabpanel-5"
                        aria-selected="false"
                    >
                        {{ $t("products.category6") }}
                    </a>
                </li>
            </ul>
            <section class="tab-content pt-5" id="tab-content">
                <section
                    class="tab-pane active"
                    id="simple-tabpanel-0"
                    role="tabpanel"
                    aria-labelledby="simple-tab-0"
                >
                    <article class="container">
                        <article class="row">
                            <article
                                class="col-md-4 d-flex flex-column align-items-center mt-4"
                                v-for="product in props.products.filter(
                                    (bs) => bs.category_id === 1
                                )"
                            >
                                <Link
                                    type="button"
                                    as="button"
                                    :href="$route('product', product.name)"
                                >
                                    <img
                                        :src="product.imageUrl"
                                        :alt="locale == 'en'? 'Product image' : 'صورة المنتج'"
                                        class="mx-auto rounded-circle bestsellingImg sliderImg"
                                        width="200"
                                        height="200"
                                        loading="lazy"

                                    />
                                </Link>

                                <p class="text-center">
                                    <a href="#" class="fs-5 colorBlueish">
                                        {{
                                            locale === "en"
                                                ? product.name
                                                : product.nameAr
                                        }}</a
                                    >
                                    <p
                                        class="d-flex my-3 justify-content-center"
                                    >
                                        <vue3-star-ratings
                                            :disableClick="true"
                                            starSize="20"
                                            v-model="product.rate"
                                            dir="ltr"
                                        />
                                    </p>
                                </p>
                            </article>
                        </article>
                    </article>
                </section>
                <section
                    class="tab-pane"
                    id="simple-tabpanel-1"
                    role="tabpanel"
                    aria-labelledby="simple-tab-1"
                >
                    <article class="container">
                        <article class="row">
                            <article
                                class="col-md-4 d-flex flex-column align-items-center mt-4"
                                v-for="product in props.products.filter(
                                    (bs) => bs.category_id === 2
                                )"
                            >
                                <Link
                                    type="button"
                                    as="button"
                                    :href="$route('product', product.name)"
                                >
                                    <img
                                        :src="product.imageUrl"
                                        :alt="locale == 'en'? 'Product image' : 'صورة المنتج'"
                                        class="mx-auto rounded-circle bestsellingImg sliderImg"
                                        width="200"
                                        height="200"
                                        loading="lazy"

                                    />
                                </Link>

                                <p class="text-center">
                                    <a href="#" class="fs-5 colorBlueish">
                                        {{
                                            locale === "en"
                                                ? product.name
                                                : product.nameAr
                                        }}</a
                                    >
                                    <p
                                        class="d-flex my-3 justify-content-center"
                                    >
                                        <vue3-star-ratings
                                            :disableClick="true"
                                            starSize="20"
                                            v-model="product.rate"
                                            dir="ltr"
                                        />
                                    </p>
                                </p>
                            </article>
                        </article>
                    </article>
                </section>
                <section
                    class="tab-pane"
                    id="simple-tabpanel-2"
                    role="tabpanel"
                    aria-labelledby="simple-tab-2"
                >
                    <article class="container">
                        <article class="row">
                            <article
                                class="col-md-4 d-flex flex-column align-items-center mt-4"
                                v-for="product in props.products.filter(
                                    (bs) => bs.category_id === 3
                                )"
                            >
                                <Link
                                    type="button"
                                    as="button"
                                    :href="$route('product', product.name)"
                                >
                                    <img
                                        :src="product.imageUrl"
                                        :alt="locale == 'en'? 'Product image' : 'صورة المنتج'"
                                        class="mx-auto rounded-circle bestsellingImg sliderImg"
                                        width="200"
                                        height="200"
                                        loading="lazy"

                                    />
                                </Link>

                                <p class="text-center">
                                    <a href="#" class="fs-5 colorBlueish">
                                        {{
                                            locale === "en"
                                                ? product.name
                                                : product.nameAr
                                        }}</a
                                    >
                                    <p
                                        class="d-flex my-3 justify-content-center"
                                    >
                                        <vue3-star-ratings
                                            :disableClick="true"
                                            starSize="20"
                                            v-model="product.rate"
                                            dir="ltr"
                                        />
                                    </p>
                                </p>
                            </article>
                        </article>
                    </article>
                </section>
                <section
                    class="tab-pane"
                    id="simple-tabpanel-3"
                    role="tabpanel"
                    aria-labelledby="simple-tab-3"
                >
                    <article class="container">
                        <article class="row">
                            <article
                                class="col-md-4 d-flex flex-column align-items-center mt-4"
                                v-for="product in props.products.filter(
                                    (bs) => bs.category_id === 4
                                )"
                            >
                                <Link
                                    type="button"
                                    as="button"
                                    :href="$route('product', product.name)"
                                >
                                    <img
                                        :src="product.imageUrl"
                                        :alt="locale == 'en'? 'Product image' : 'صورة المنتج'"
                                        class="mx-auto rounded-circle bestsellingImg sliderImg"
                                        width="200"
                                        height="200"
                                        loading="lazy"

                                    />
                                </Link>

                                <p class="text-center">
                                    <a href="#" class="fs-5 colorBlueish">
                                        {{
                                            locale === "en"
                                                ? product.name
                                                : product.nameAr
                                        }}</a
                                    >
                                    <p
                                        class="d-flex my-3 justify-content-center"
                                    >
                                        <vue3-star-ratings
                                            :disableClick="true"
                                            starSize="20"
                                            v-model="product.rate"
                                            dir="ltr"
                                        />
                                    </p>
                                </p>
                            </article>
                        </article>
                    </article>
                </section>
                <section
                    class="tab-pane"
                    id="simple-tabpanel-4"
                    role="tabpanel"
                    aria-labelledby="simple-tab-4"
                >
                    <article class="container">
                        <article class="row">
                            <article
                                class="col-md-4 d-flex flex-column align-items-center mt-4"
                                v-for="product in props.products.filter(
                                    (bs) => bs.category_id === 5
                                )"
                            >
                                <Link
                                    type="button"
                                    as="button"
                                    :href="$route('product', product.name)"
                                >
                                    <img
                                        :src="product.imageUrl"
                                        :alt="locale == 'en'? 'Product image' : 'صورة المنتج'"
                                        class="mx-auto rounded-circle bestsellingImg sliderImg"
                                        width="200"
                                        height="200"
                                        loading="lazy"

                                    />
                                </Link>

                                <p class="text-center">
                                    <a href="#" class="fs-5 colorBlueish">
                                        {{
                                            locale === "en"
                                                ? product.name
                                                : product.nameAr
                                        }}</a
                                    >
                                    <p
                                        class="d-flex my-3 justify-content-center"
                                    >
                                        <vue3-star-ratings
                                            :disableClick="true"
                                            starSize="20"
                                            v-model="product.rate"
                                            dir="ltr"
                                        />
                                    </p>
                                </p>
                            </article>
                        </article>
                    </article>
                </section>
                <section
                    class="tab-pane"
                    id="simple-tabpanel-5"
                    role="tabpanel"
                    aria-labelledby="simple-tab-5"
                >
                    <article class="container">
                        <article class="row">
                            <article
                                class="col-md-4 d-flex flex-column align-items-center mt-4"
                                v-for="product in props.products.filter(
                                    (bs) => bs.category_id === 6
                                )"
                            >
                                <Link
                                    type="button"
                                    as="button"
                                    :href="$route('product', product.name)"
                                >
                                    <img
                                        :src="product.imageUrl"
                                        :alt="locale == 'en'? 'Product image' : 'صورة المنتج'"
                                        class="mx-auto rounded-circle bestsellingImg sliderImg"
                                        width="200"
                                        height="200"
                                        loading="lazy"

                                    />
                                </Link>

                                <p class="text-center">
                                    <a href="#" class="fs-5 colorBlueish">
                                        {{
                                            locale === "en"
                                                ? product.name
                                                : product.nameAr
                                        }}</a
                                    >
                                    <p
                                        class="d-flex my-3 justify-content-center"
                                    >
                                        <vue3-star-ratings
                                            :disableClick="true"
                                            starSize="20"
                                            v-model="product.rate"
                                            dir="ltr"
                                        />
                                    </p>
                                </p>
                            </article>
                        </article>
                    </article>
                </section>
                
            </section>
        </section>
    </section>
</template>

<style scoped>
.active{
    color: rgb(106, 106, 128) !important;
}
</style>