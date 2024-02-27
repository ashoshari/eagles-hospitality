<template>
        <section class="container-fluid marginTopHalf">
        <section class="row justify-content-center g-0">
            <p
                class="col-md-3 d-flex flex-column align-items-center justify-content-between feature-card"
            >
                <i class="fa-solid fa-sack-dollar fa-2xl"></i>
                <p class="mt-5">
                    <h4 class="fw-bold">{{ $t("securePayment.title") }}</h4>
                    <p class="fw-bold">
                        {{ $t("securePayment.explaination") }}
                    </p>
                </p>
            </p>
            <p
                class="col-md-3 d-flex flex-column align-items-center justify-content-between feature-card"
            >
                <i class="fa-solid fa-award fa-2xl"></i>
                <p class="mt-5">
                    <h4 class="fw-bold">{{ $t("dayReturn.title") }}</h4>
                    <p class="fw-bold">
                        {{ $t("dayReturn.explaination") }}
                    </p>
                </p>
            </p>
            <p
                class="col-md-3 d-flex flex-column align-items-center justify-content-between feature-card"
            >
                <i class="fa-solid fa-phone fa-2xl"></i>
                <p class="mt-5">
                    <h4 class="fw-bold">{{ $t("support.title") }}</h4>
                    <p class="fw-bold">{{ $t("support.explaination") }}</p>
                </p>
            </p>
        </section>
    </section> 
</template>