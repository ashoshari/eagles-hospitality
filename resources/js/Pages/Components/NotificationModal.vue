<script setup>
import { onMounted, onUnmounted } from "vue";
const props = defineProps({
    contact: Object,
});

const emit = defineEmits(["close"]);

const closeOnEscape = (e) => {
    if (e.key === "Escape") {
        close();
    }
};

const close = () => {
    emit("close");
};

onMounted(() => document.addEventListener("keydown", closeOnEscape));
onUnmounted(() => {
    document.removeEventListener("keydown", closeOnEscape);
});
</script>

<template>
    <section
        dir="ltr"
        class="d-flex flex-column gap-5 contact position-fixed bgBlueish text-white p-5"
    >
        <article class="d-flex gap-4 border-bottom pb-3">
            <img
                :src="props.contact.imageUrl"
                :alt="
                    locale == 'en'
                        ? 'Contact user image'
                        : 'الصورة الشخصية للعميل'
                "
                class="reviewImg"
                width="50"
                height="50"
                loading="lazy"
            />
            <p>
                {{ props.contact.username }}
            </p>
        </article>

        <p class="text-break">
            {{ props.contact.message }}
        </p>
    </section>
    <div @click="close" class="coverWindow position-fixed"></div>
</template>

<style scoped>
.contact {
    min-width: 600px;
    min-height: 300px;
    background-color: #1a283d;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 101;
    border-radius: 12px;
}
.coverWindow {
    width: 100%;
    height: 1000vh;
    z-index: 100;
}
@media (max-width: 676px) {
    .contact {
        min-width: auto;
        width: 100%;
    }
}
</style>
