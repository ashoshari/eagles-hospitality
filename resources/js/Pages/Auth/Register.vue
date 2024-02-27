<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
const locale = ref(localStorage.getItem("locale"));
onMounted(() => {
    window.addEventListener("locale-changed", (event) => {
        locale.value = event.detail.storage;
    });
});
const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    image: null,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head :title="locale == 'en'? 'Register' : 'أنشىء حساب'"  />

        <form @submit.prevent="submit" class="marginTopHalf">
            <p>
                <InputLabel
                    for="name"
                    :value="$t('profile.profileInfoName')"
                    class="fw-bold"
                />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </p>

            <p class="mt-4">
                <InputLabel
                    for="email"
                    :value="$t('profile.profileInfoEmail')"
                    class="fw-bold"
                />

                <TextInput
                    id="email"
                    type="email"
                    class=" mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </p>

            <p class="mt-4">
                <InputLabel
                    for="password"
                    :value="$t('profile.password')"
                    class="fw-bold"
                />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </p>

            <p class="mt-4">
                <InputLabel
                    for="password_confirmation"
                    :value="$t('profile.updatePasswordConfirm')"
                    class="fw-bold"
                />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                />
            </p>

            <p class="mt-4">
                <InputLabel
                    for="image"
                    :value="$t('profile.profileImage')"
                    class="fw-bold"
                />

                <TextInput
                    type="file"
                    @input="form.image = $event.target.files[0]"
                    accept="image/png, image/gif, image/jpeg, image/bmp"
                    class=" mt-1 block w-full"
                    required
                />

                <InputError class="mt-2" :message="form.errors.image" />
            </p>

            <p class="flex items-center justify-end mt-4">
                <Link
                    :href="$route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    {{ $t("profile.alreadyRegistered") }}
                </Link>

                <PrimaryButton
                    class="mx-4 bgBlueish hoverColorBlueish rounded"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    {{ $t("header.register") }}
                </PrimaryButton>
            </p>
        </form>
    </GuestLayout>
</template>
