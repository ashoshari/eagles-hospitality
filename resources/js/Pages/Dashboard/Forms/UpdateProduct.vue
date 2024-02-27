<script setup>
import { useToast } from "primevue/usetoast";
import { useForm } from "@inertiajs/vue3";
const props = defineProps({ product: Object, categories: Object });
const emit = defineEmits(["close"]);
import { onMounted } from "vue";
onMounted(() => {
    form.reset();
});
const closeModal = () => {
    emit("close");
};

const selectOptions = (e) => {
    form.bestSelling = e.target.value;
};

const toast = useToast();
const form = useForm("UpdateProduct", {
    name: props.product.name,
    nameAr: props.product.nameAr,
    description: props.product.description,
    descriptionAr: props.product.descriptionAr,
    size: props.product.size,
    quantityPerPacket: props.product.quantityPerPacket,
    bestSelling: props.product.bestSelling,
    category: props.product.category,
    image: null,
});

const updateProduct = () => {
    form.bestSelling = form.bestSelling === "1" ? true : false;
    form.post(route("update-product", props.product.id), {
        preserveScroll: true,

        onSuccess: () => {
            closeModal();
            toast.add({
                severity: "success",
                summary: "Successful",
                detail: "Product Updated",
                life: 3000,
            });
        },
    });
};

const handleImage = (e) => {
    form.image = e.target.files[0];
    const reader = new FileReader();
    reader.onload = function (e) {
        $("#productImg").attr("src", e.target.result).width(100).height(100);
    };

    reader.readAsDataURL(form.image);
};
</script>

<template>
    <form @submit.prevent="updateProduct" class="p-4">
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
                <option v-for="category in categories">
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
                v-model="form.size"
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
            <label class="form-label fw-bold" for="name">{{
                $t("createProduct.QuantityPerPacket")
            }}</label>
            <input
                type="text"
                id="quantityPerPacket"
                class="form-control border rounded"
                v-model.trim="form.quantityPerPacket"
            />
            <div v-show="form.errors.quantityPerPacket">
                <p class="text-danger text-center">
                    {{ form.errors.quantityPerPacket }}
                </p>
            </div>
        </p>

        <p class="field">
            <label class="form-label fw-bold" for="bestSelling">{{
                $t("createProduct.bestSelling")
            }}</label>
            <select
                id="bestSelling"
                class="form-control border rounded"
                required
                @click="selectOptions"
                dir="ltr"
                v-model="form.bestSelling"
            >
                <option value="1">Yes</option>
                <option value="0">No</option>
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
                @input="handleImage"
                accept="image/png, image/gif, image/jpeg, image/bmp"
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
            <img
                id="productImg"
                :src="product.imageUrl"
                :alt="locale == 'en'? 'Product image' : 'صورة المنتج'"
                class="mx-auto"
                style="width: 100px; height: 100px"
                width="100"
                height="100"
                loading="lazy"

            />
        </p>

        <button class="btn btn-danger mx-2 mt-5 w-25" @click="closeModal">
            {{ $t("createProduct.cancel") }}
        </button>

        <button
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
            type="submit"
            class="btn btn-secondary text-white w-25 mt-5"
        >
            {{ $t("products.update") }}
        </button>
    </form>
</template>
