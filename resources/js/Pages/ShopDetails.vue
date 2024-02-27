<script setup>
import vue3StarRatings from "vue3-star-ratings";
import { useForm, Head } from "@inertiajs/vue3";
import { useToast } from "primevue/usetoast";
import moment from "moment";
import { ref, onMounted } from "vue";
import Toast from "primevue/toast";

const locale = ref(localStorage.getItem("locale"));

onMounted(() => {
    window.addEventListener("locale-changed", (event) => {
        locale.value = event.detail.storage;
    });
});

const toast = useToast();
const props = defineProps({
    product: Object,
    productAvgRate: Number,
    reviews: Object,
});

const rate = props.productAvgRate;

const form = useForm("addReview", {
    username: "",
    email: "",
    review: "",
    rate: 5,
});

const submit = (id) => {
    form.post(route("products.reviews.store", id), {
        preserveScroll: true,
        onSuccess: () => {
            toast.add({
                severity: "success",
                summary: "Successful",
                detail: "Review has been added successfully",
                life: 3000,
            });
            form.reset();
        },
    });
};
</script>

<template>
    <Head :title="locale == 'en' ? props.product[0].name : props.product[0].nameAr" />

    <section class="container-fluid py-5 marginTopHalf">
        <aside class="card flex justify-content-center">
            <Toast />
        </aside>
        <section class="container py-5">
            <section class="row g-4">
                <article class="col-lg-6">
                    <article class="border rounded">
                        <a href="#" class="d-flex flex-column justify-content-center align-items-center">
                            <img :src="props.product[0].imageUrl" class="img-fluid rounded productImg" width="400"
                                height="400" loading="lazy" :alt="locale == 'en' ? 'Product image' : 'صورة المنتج'" />
                            <p class="align-self-start ms-5 mt-3 colorOrange fw-bold">
                                {{
                                    props.product[0].bestSelling
                                    ? $t("products.bestSelling")
                                    : null
                                }}
                            </p>
                        </a>
                    </article>
                </article>
                <article class="col-lg-6">
                    <h4 class="fw-bold mb-3">
                        {{
                            locale === "en"
                            ? product[0].name
                            : product[0].nameAr
                        }}
                    </h4>
                    <p class="d-flex mb-4">
                        <vue3-star-ratings dir="ltr" starSize="20" v-model="rate" :disableClick="true" />
                    </p>
                    <p class="mb-4 text-break">
                        {{
                            locale === "en"
                            ? product[0].description
                            : product[0].descriptionAr
                        }}
                    </p>
                    <p class="mb-4 text-break">
                        <span class="fw-bold">{{ $t("products.size") }}</span>
                        {{ product[0].size }}
                    </p>
                    <p class="mb-4 text-break">
                        <span class="fw-bold">{{
                            $t("products.quantity")
                        }}</span>
                        {{ product[0].quantityPerPacket }}
                    </p>
                </article>
                <aside class="row d-flex justify-content-between marginTopHalf">
                    <article class="mb-3">
                        <h2 v-if="reviews.length > 0">
                            {{ $t("reviews") }}
                        </h2>
                        <article v-for="review in props.reviews" class="row mt-5 border-bottom-1 pb-5 border-secondary">
                            <article class="col-md-6 d-flex gap-4 py-5">
                                <img :src="review.imageUrl" class="reviewImg col-md-2"
                                    :alt="locale == 'en' ? 'User image' : 'صورة المستخدم'" width="50" height="50"
                                    loading="lazy" />
                                <p>
                                <h6 class="lh0">
                                    {{ review.username }}
                                </h6>
                                <vue3-star-ratings starSize="11" v-model="review.rate" />
                                <p class="text-muted mt-4 text-break">
                                    {{ review.review }}
                                </p>
                                </p>
                            </article>

                            <aside class="col-md-6 d-flex justify-content-end align-items-center mb-3">
                                <p>
                                    {{ moment(review.created_at).fromNow() }}
                                </p>
                            </aside>
                        </article>
                    </article>
                </aside>
                <form @submit.prevent="submit(props.product[0].id)">
                    <h4 class="mb-5 fw-bold" :class="[locale === 'en' ? null : 'me-4']">
                        {{ $t("rateOurProduct") }}
                    </h4>
                    <section class="row g-4">
                        <article class="col-lg-6">
                            <article class="border-bottom rounded">
                                <input type="text" class="form-control border-0 me-4"
                                    :placeholder="$t('profile.profileInfoName')" v-model="form.username" required />
                                <p v-show="form.errors.username">
                                <p class="text-danger p-2">
                                    {{ form.errors.username }}
                                </p>
                                </p>
                            </article>
                        </article>
                        <article class="col-lg-6">
                            <p class="border-bottom rounded">
                                <input type="email" class="form-control border-0" :placeholder="$t('profile.profileInfoEmail')
                                    " v-model="form.email" required />
                            </p>
                            <p v-show="form.errors.email">
                            <p class="text-danger p-2">
                                {{ form.errors.email }}
                            </p>
                            </p>
                        </article>
                        <article class="col-lg-12">
                            <article class="border-bottom rounded my-4">
                                <textarea name="" id="" class="form-control border-0 me-4" cols="30" rows="8"
                                    :placeholder="$t('yourReview')" spellcheck="false" v-model="form.review"
                                    required></textarea>
                                <p v-show="form.errors.review">
                                <p class="text-danger p-2">
                                    {{ form.errors.review }}
                                </p>
                                </p>
                            </article>
                        </article>
                        <aside class="col-lg-12">
                            <article class="d-flex justify-content-between py-3 mb-5">
                                <article class="d-flex align-items-center">
                                    <p class="mb-0 me-3 fw-bold">
                                        {{ $t("productRate") }}
                                    </p>
                                    <div class="d-flex align-items-center" dir="ltr">
                                        <vue3-star-ratings starSize="20" v-model="form.rate" />
                                    </div>
                                </article>
                                <button href="#"
                                    class="btn fw-bold borderBlueish colorBlueish rounded-pill px-4 py-3 fancyBtn">
                                    {{ $t("comment") }}
                                </button>
                            </article>
                        </aside>
                    </section>
                </form>
            </section>
        </section>
    </section>
</template>
