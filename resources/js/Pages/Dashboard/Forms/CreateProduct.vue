<script setup>
import { useToast } from "primevue/usetoast";
import { useForm } from "@inertiajs/vue3";

const emit = defineEmits(["close"]);

const props = defineProps({
    categories: Object,
});

const closeModal = () => {
    emit("close");
};


const toast = useToast();
const form = useForm("CreateProduct", {
    name: "",
    nameAr: "",
    description: "",
    descriptionAr: "",
    size: "",
    quantityPerPacket: "",
    bestSelling: "",
    image: null,
    category: "",
});

const createProduct = () => {
    form.bestSelling = form.bestSelling === "Yes" ? true : false;

    form.post(route("products.store"), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
            toast.add({
                severity: "success",
                summary: "Successful",
                detail: "Product Created",
                life: 3000,
            });
        },
    });
};
</script>

<template>
    <form @submit.prevent="createProduct" class="p-4">
        <p class="field">
            <label class="form-label fw-bold" for="category">
                {{ $t("createProduct.category") }}
            </label>
            <select
                id="category"
                v-model="form.category"
                class="form-control border rounded"
                required
                dir="ltr"
            >
                <option v-for="category in props.categories">
                    {{ category.name }}
                </option>
            </select>
            <div v-show="form.errors.category">
                <p class="text-danger text-center">
                    {{ form.errors.category }}
                </p>
            </div>
        </p>

        <p class="field">
            <label class="form-label fw-bold" for="name">
                {{ $t("createProduct.nameEnglish") }}
            </label>
            <input
                type="text"
                id="name"
                class="form-control border rounded"
                v-model.trim="form.name"
                required
                autofocus
            />
            <div v-show="form.errors.name">
                <p class="text-danger text-center">
                    {{ form.errors.name }}
                </p>
            </div>
        </p>

        <p class="field">
            <label class="form-label fw-bold" for="nameAr">
                {{ $t("createProduct.nameArabic") }}
            </label>
            <input
                type="text"
                id="nameAr"
                class="form-control border rounded"
                v-model.trim="form.nameAr"
                required
            />
            <div v-show="form.errors.nameAr">
                <p class="text-danger text-center">
                    {{ form.errors.nameAr }}
                </p>
            </div>
        </p>

        <p class="field">
            <label class="form-label fw-bold" for="description">
                {{ $t("createProduct.descEnglish") }}
            </label>

            <textarea
                id="description"
                class="form-control border rounded"
                v-model.trim="form.description"
                required
                rows="5"
            >
            </textarea>

            <div v-show="form.errors.description">
                <p class="text-danger text-center">
                    {{ form.errors.description }}
                </p>
            </div>
        </p>

        <p class="field">
            <label class="form-label fw-bold" for="descriptionAr">
                {{ $t("createProduct.descArabic") }}
            </label>
            <textarea
                type="text"
                id="descriptionAr"
                class="form-control border rounded"
                v-model.trim="form.descriptionAr"
                required
                rows="5"
            >
            </textarea>

            <div v-show="form.errors.descriptionAr">
                <p class="text-danger text-center">
                    {{ form.errors.descriptionAr }}
                </p>
            </div>
        </p>

        <p class="field">
            <label class="form-label fw-bold" for="size">
                {{ $t("createProduct.size") }}
            </label>
            <select
                id="size"
                v-model.trim="form.size"
                class="form-control border rounded"
                required
                dir="ltr"
            >
                <option>Large</option>
                <option>Medium</option>
                <option>XLarge</option>
                <option>2 ML</option>
                <option>3 ML</option>
                <option>5 ML</option>
                <option>6 ML</option>
                <option>20 ML</option>
                <option>30 ML</option>
                <option>15 GM</option>
                <option>20 GM</option>
                <option>30 GM</option>
            </select>
            <div v-show="form.errors.size">
                <p class="text-danger text-center">
                    {{ form.errors.size }}
                </p>
            </div>
        </p>

        <p class="field">
            <label class="form-label fw-bold" for="quantityPerPacket">
                {{ $t("createProduct.QuantityPerPacket") }}
            </label>
            <input
                type="text"
                id="quantityPerPacket"
                class="form-control border rounded"
                v-model.trim="form.quantityPerPacket"
                required
            />
            <div v-show="form.errors.quantityPerPacket">
                <p class="text-danger text-center">
                    {{ form.errors.quantityPerPacket }}
                </p>
            </div>
        </p>

        <p class="field">
            <label class="form-label fw-bold" for="bestSelling">
                {{ $t("createProduct.bestSelling") }}
            </label>
            <select
                id="bestSelling"
                v-model.trim="form.bestSelling"
                class="form-control border rounded"
                required
                dir="ltr"
            >
                <option>Yes</option>
                <option>No</option>
            </select>
            <div v-show="form.errors.bestSelling">
                <p class="text-danger text-center">
                    {{ form.errors.bestSelling }}
                </p>
            </div>
        </p>
        <p class="field">
            <input
                type="file"
                @input="form.image = $event.target.files[0]"
                accept="image/png, image/gif, image/jpeg, image/bmp"
                required
            />
            <progress
                v-if="form.progress"
                :value="form.progress.percentage"
                max="100"
            >
                {{ form.progress.percentage }}%
            </progress>
            <div v-show="form.errors.image">
                <p class="text-danger text-center">
                    {{ form.errors.image }}
                </p>
            </div>
        </p>

        <button
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
            type="submit"
            class="btn btn-danger w-25"
            @click="closeModal"
        >
            {{ $t("createProduct.cancel") }}
        </button>

        <button
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
            type="submit"
            class="btn btn-secondary w-25 mx-2"
        >
            {{ $t("createProduct.create") }}
        </button>
    </form>
</template>
