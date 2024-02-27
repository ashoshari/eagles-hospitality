<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
const locale = ref(localStorage.getItem("locale"));
onMounted(() => {
    window.addEventListener("locale-changed", (event) => {
        locale.value = event.detail.storage;
    });
});
defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head :title="locale == 'en'? 'Login' : 'تسجيل الدخول'" />

        <div v-if="status" class="mb-4 mt-5 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <InputError class="mt-2" :message="form.errors.email" />

            <p>
                <InputLabel
                    for="email"
                    :value="$t('profile.profileInfoEmail')"
                    class="fw-bold"
                />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

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
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </p>

            <p class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600">
                        {{ $t("profile.rememberMe") }}
                    </span>
                </label>
            </p>

            <p class="flex items-center justify-end mt-4">
                <PrimaryButton
                    class="mx-4 bgBlueish hoverColorBlueish rounded"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    {{ $t("header.login") }}
                </PrimaryButton>
            </p>
        </form>
    </GuestLayout>
</template>

<style scoped>
@media (max-width: 640px) {
    form{
        margin-top: 50px;
    }
}
</style>