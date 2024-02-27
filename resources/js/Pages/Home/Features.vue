<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title"> {{ $t("whyWe.title") }}
                    </h2>
                    <p>
                        {{ $t("whyWe.par") }}
                    </p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <i class="fa-solid fa-hotel fs-2 mb-3"></i>
                                </div>
                                <h3>
                                    <h4>{{ $t("hotelEq.title") }}</h4>
                                </h3>
                                <p>
                                    {{ $t("hotelEq.par") }}
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <i class="fa-solid fa-dollar-sign fs-2 mb-3"></i>
                                </div>
                                <h3>{{ $t("suitablePrices.title") }}</h3>
                                <p>
                                    {{ $t("suitablePrices.par") }}
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <i class="fa-solid fa-bed fs-2 mb-3"></i>
                                </div>
                                <h3>{{ $t("cottonReq.title") }}</h3>
                                <p>
                                    {{ $t("cottonReq.par") }}
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <i class="fa-solid fa-copyright fs-2 mb-3"></i>
                                </div>
                                <h3>{{ $t("logoMake.title") }}</h3>
                                <p>
                                    {{ $t("logoMake.par") }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="../../../../public/img1.jfif" alt="mattress" class="img-fluid" width="526" height="526"
                            loading="lazy" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="we-help-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="imgs-grid">
                        <div class="grid grid-1">
                            <img src="../../../../public/img3.jfif" alt="products" width="500" height="400"
                                loading="lazy" />
                        </div>
                        <div class="grid grid-2">
                            <img src="../../../../public/img2.jfif" alt="towels" width="230" height="230" loading="lazy" />
                        </div>
                        <div class="grid grid-3">
                            <img src="../../../../public/img4.jpg" alt="mattress" width="387" height="387" loading="lazy" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <h2 class="section-title mb-4">
                        {{ $t("mainTitle") }}
                    </h2>
                    <p>
                        {{ $t("aboutus.about1") }}
                    </p>

                    <Link as="button" type="button" :href="$route('shop', 'all')"
                        class="mt-4 btn bgBlueish border-2 py-sm-3 px-sm-5 rounded-pill text-white shopNow hoverColorBlueish">
                    {{ $t("shopNow.title") }}
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
