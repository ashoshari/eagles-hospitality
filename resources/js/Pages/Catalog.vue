<script setup>
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import "swiper/css/effect-cards";
import "swiper/css/navigation";
import { EffectCards, Keyboard, Navigation } from "swiper/modules";
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import BestSeller from "./Home/BestSeller.vue";
import Statistics from './Home/Statistics.vue';
const locale = ref(localStorage.getItem("locale"));
onMounted(() => {
    window.addEventListener("locale-changed", (event) => {
        locale.value = event.detail.storage;
    });


    const next = document.querySelector(".swiper-button-next");
    const prev = document.querySelector(".swiper-button-prev");

    if (locale.value === "en") {
        next.style.setProperty("--marginRight", "-300px");
        prev.style.setProperty("--marginLeft", "-300px");
    } else {
        next.style.setProperty("--marginRight", "300px");
        prev.style.setProperty("--marginLeft", "300px");
    }
});
const props = defineProps({
    products: Object,
});

</script>
<template>
    <main class="marginTopHalf">
        <section>

            <Head>
                <title>{{ locale == "en" ? "Catalog" : "كتالوج" }}</title>
            </Head>
        </section>
        <section class="container-fluid px-0 ">
            <div class="trans py-5 d-flex flex-column align-items-center">
                <h1 class="display-1 fw-bold text-white text-center pt-5">
                    {{ $t("header.company") }}
                </h1>
                <h2 class="text-white fw-bold  mt-5 pb-5 px-5">
                    {{ $t("header.companyCompliment") }}
                </h2>
            </div>


            <!-- <video class="mt-5" autoplay muted loop id="myVideo">
                <source
                    src="../../../../public/Eagles hospitality.mp4"
                    type="video/mp4"
                />
            </video> -->
            <section class="hero-inner row justify-content-center py-6 m-0">
                <!-- <aside class="col-md-6">
                    <form class="position-relative left-lg-20 mt-5">
                        <input class="form-control border-2 border-secondary py-sm-3 px-sm-4 rounded-pill"
                            :class="locale == 'en' ? null : 'text-start'" :placeholder="locale == 'en'
                                ? 'Keywords'
                                : 'أدخل كلمات مفتاحية '
                                " data-bs-toggle="modal" data-bs-target="#searchModal" />
                        <Link as="button" type="button" :href="$route('shop', 'all')"
                            class="btn bgBlueish border-2 border-secondary py-sm-3 px-sm-5 position-absolute rounded-pill text-white shopNow hoverColorBlueish">
                        {{ $t("shopNow.title") }}
                        </Link>
                    </form>
                </aside> -->
                <aside class="col-md-12">
                    <swiper :effect="'cards'" :grabCursor="true" :modules="[EffectCards, Keyboard, Navigation]"
                        class="mySwiper mt-5" :navigation="true">
                        <swiper-slide v-for="product in props.products">
                            <Link type="button" as="button" :href="$route('product', product.name)">
                            <img :src="product.imageUrl" :alt="locale == 'en'
                                ? 'Product image'
                                : 'صورة المنتج'
                                " loading="lazy" />
                            </Link>
                        </swiper-slide>
                    </swiper>
                </aside>
            </section>
        </section>
        <section>
            <BestSeller :products="props.products" />
        </section>
        <section>
            <Statistics />
        </section>
    </main>
</template>
<style scoped>
.swiper {
    width: 63%;
    height: 100%;
    overflow: visible !important;
}

.swiper-slide {
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 18px;
    background-color: #fff;
}

::v-global(.swiper-button-next:after) {
    margin-right: var(--marginRight, 0);
    color: #000;
}

::v-global(.swiper-button-prev:after) {
    margin-left: var(--marginLeft, 0);
    color: #000;
}

::v-global(.swiper-pagination-bullet-active) {
    background-color: #000 !important;
}

@media (max-width: 1200px) {
    .swiper {
        width: 300px;
        height: 300px;
    }
}

@media (max-width: 767px) {
    .swiper {
        width: 200px;
        height: 200px;
    }

    ::v-global(.swiper-button-next:after) {
        margin-right: 150px;
    }

    ::v-global(.swiper-button-prev:after) {
        margin-left: 150px;
    }
}

@media (max-width: 417px) {
    .hero-section {
        margin-top: 100px;
    }

    .swiper {
        width: 150px;
        height: 150px;
    }
}
</style>
