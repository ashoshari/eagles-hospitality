<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import Toast from "primevue/toast";

import { useToast } from "primevue/usetoast";
const toast = useToast();

const locale = ref(localStorage.getItem("locale"));

onMounted(() => {
    window.addEventListener("locale-changed", (event) => {
        locale.value = event.detail.storage;
    });
});

const form = useForm({
    username: "",
    email: "",
    message: "",
});
const submit = () => {
    console.log("object");
    form.post(route("contacts.store"), {
        preserveScroll: true,
        onSuccess: () => {
            toast.add({
                severity: "success",
                summary: "Successful",
                detail: "Message sent successfully",
                life: 3000,
            });
        },
    });
};
</script>

<template>
    <Head :title="locale == 'en'? 'Contact us' : 'تواصل معنا'" />

    <section class="container-fluid p-md-5 marginTopHalf">
        <section class="row g-4 justify-content-center marginTopHalf">
            <aside class="col-lg-6">
                <form @submit.prevent="submit">
                    <input
                        type="text"
                        class="w-100 form-control py-md-3 mb-4"
                        :placeholder="$t('contact.formName')"
                        v-model="form.username"
                    />
                    <p v-show="form.errors.username">
                        <p class="text-danger text-center">
                            {{ form.errors.username }}
                        </p>
                    </p>
                    <input
                        type="email"
                        class="w-100 form-control py-md-3 mb-4"
                        :placeholder="$t('contact.formEmail')"
                        v-model="form.email"
                    />
                    <p v-show="form.errors.email">
                        <p class="text-danger text-center">
                            {{ form.errors.email }}
                        </p>
                    </p>
                    <textarea
                        class="w-100 form-control mb-4"
                        rows="5"
                        cols="10"
                        :placeholder="$t('contact.formMessage')"
                        v-model="form.message"
                    ></textarea>
                    <p v-show="form.errors.message">
                        <p class="text-danger text-center">
                            {{ form.errors.message }}
                        </p>
                    </p>
                    <button
                        class="w-50 fw-bold form-control py-md-3 bg-white colorBlueish fancyBtn z-0"
                    >
                        {{ $t("contact.formSubmit") }}
                    </button>
                </form>
            </aside>
            <aside class="col-lg-3">
                <p class="d-flex p-md-4 rounded mb-4 bg-white">
                    <i
                        class="fas fa-map-marker-alt fa-2x colorBlueish me-4"
                    ></i>
                    <p>
                        <h4>
                            {{ $t("contact.title") }}
                        </h4>
                        <p class="mb-2">{{ $t("contact.address") }}</p>
                    </p>
                </p>
                <p class="d-flex p-md-4 rounded mb-4 bg-white">
                    <i class="fas fa-envelope fa-2x colorBlueish me-4"></i>
                    <p>
                        <h4>
                            {{ $t("contact.mailUs") }}
                        </h4>
                        <p class="mb-2">{{ $t("contact.gmail") }}</p>
                    </p>
                </p>
                <p class="d-flex p-md-4 rounded bg-white">
                    <i class="fa fa-phone-alt fa-2x colorBlueish me-4"></i>
                    <p>
                        <h4>
                            {{ $t("contact.telephoneTitle") }}
                        </h4>
                        <p class="mb-2">{{ $t("contact.telephone") }}</p>
                    </p>
                </p>
            </aside>
        </section>
        <Toast />
    </section>
</template>
