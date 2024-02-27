<script setup>
// import { Swiper, SwiperSlide } from "swiper/vue";
// import { Pagination, Navigation } from "swiper/modules";
// import { Link } from "@inertiajs/vue3";
// import { ref, onMounted } from "vue";
// import "swiper/css/navigation";
// import "swiper/css";
// import "swiper/css/pagination";
// const locale = ref(localStorage.getItem("locale"));

// onMounted(() => {
//     window.addEventListener("locale-changed", (event) => {
//         locale.value = event.detail.storage;
//     });

//     const img = document.querySelectorAll(".sliderImg");
//     img.forEach((e) => (e.parentElement.style.height = "240px"));
// });

// const props = defineProps({
//     products: Object,
// });
</script>

<template>
    <!-- Vesitable Shop Start-->
    <!-- <section class="container-fluid vesitable marginTopHalf bgBlueish">
        <section class="container py-5">
            <h1 class="mb-5 text-white">
                {{ $t("products.title") }}
            </h1>
            <section class="row">
                <article>
                    <swiper :slidesPerView="1" :spaceBetween="1" :pagination="{
                        clickable: true,
                    }" :modules="[Pagination, Navigation]" :navigation="true" :breakpoints="{
    '640': {
        slidesPerView: 2,
        spaceBetween: 20,
    },
    '767': {
        slidesPerView: 3,
        spaceBetween: 20,
    },
    '991': {
        slidesPerView: 4,
        spaceBetween: 40,
    },

    '1400': {
        slidesPerView: 5,
        spaceBetween: 50,
    },
}" class="mySwiper">
                        <swiper-slide v-for="product in props.products">
                            <div class="d-flex flex-column align-items-center px-md-4">
                                <div>
                                    <Link type="button" as="button" :href="$route('product', product.name)"
                                        class="text-white">
                                    <img :src="product.imageUrl" :alt="locale == 'en'
                                            ? 'Product image'
                                            : 'صورة المنتج'
                                        " class="sliderImg" style="
                                                min-width: 200px;
                                                min-height: 200px;
                                            " width="200" height="200" loading="lazy" />
                                    </Link>
                                    <p class="mt-3 text-white text-break">
                                        {{
                                            locale === "en"
                                            ? product.name
                                            : product.nameAr
                                        }}
                                    </p>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="text-white fw-normal text-sm text-break" style="
                                            max-width: 200px;
                                            max-height: 160px;
                                        ">
                                        {{
                                            locale === "en"
                                            ? product.description
                                            : product.descriptionAr
                                        }}
                                    </p>
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper>
                </article>
            </section>
        </section>
    </section> -->
</template>

<!-- <style scoped>
.swiper {
    width: 100%;
    height: 560px;
}

.swiper-slide {
    padding-bottom: 70px;
    text-align: center;
    font-size: 18px;
    /* Center slide text vertically */
    display: flex;
    justify-content: center;
    overflow: visible;
}

.swiper-slide img {
    display: block;
    max-width: 200px;
    max-height: 200px;
    object-fit: cover;
    border: 1px solid #fff;
    border-radius: 50%;
    margin: 0 auto;
    background-color: #fff;
} -->
<!-- </style> -->
