<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import "primevue/resources/themes/lara-light-blue/theme.css";
import { ref, onMounted } from "vue";
import { FilterMatchMode } from "primevue/api";
import { Head, router } from "@inertiajs/vue3";
import CreateProduct from "./Forms/CreateProduct.vue";
import UpdateProduct from "./Forms/UpdateProduct.vue";
import { useToast } from "primevue/usetoast";
import Modal from "../Components/Modal.vue";
import Button from "primevue/button";
import Column from "primevue/column";
import DataTable from "primevue/datatable";
import Dialog from "primevue/dialog";
import InputText from "primevue/inputtext";
import Toast from "primevue/toast";
import FileUpload from "primevue/fileupload";
import Toolbar from "primevue/toolbar";
import "primeicons/primeicons.css";
import "primeflex/primeflex.css";
const toast = useToast();

const props = defineProps({
    products: Object,
    categories: Object,
});

const trashDisabled = ref(false);
const productToDelete = ref();
const productToUpdate = ref();
const dt = ref();
const deleteProductDialog = ref(false);
const createProductDialog = ref(false);
const updateProductDialog = ref(false);
const deleteProducts = ref(false);
const selectedProducts = ref([]);
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
});

const confirmDeleteProduct = (prod) => {
    productToDelete.value = prod;
    deleteProductDialog.value = true;
};
const deleteProduct = () => {
    trashDisabled.value = true;
    router.delete(route("products.destroy", productToDelete.value.id), {
        onSuccess: () => (trashDisabled.value = false),
    });
    deleteProductDialog.value = false;
    productToDelete.value = {};
    toast.add({
        severity: "success",
        summary: "Successful",
        detail: "Product Deleted",
        life: 3000,
    });
};

const updateProduct = (prod) => {
    productToUpdate.value = prod;
    updateProductDialog.value = true;
};

const exportCSV = () => {
    dt.value.exportCSV();
};
const confirmDeleteSelected = () => {
    deleteProducts.value = true;
};
const deleteselectedProducts = () => {
    const ids = selectedProducts.value.map((user) => user.id);

    router.delete(route("deleteManyProducts", { ids }));
    deleteProducts.value = false;
    selectedProducts.value = null;
    toast.add({
        severity: "success",
        summary: "Successful",
        detail: "Products Deleted",
        life: 3000,
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <Head title="Dashboard" />
        <div dir="ltr" class="container-fluid w-75 marginTop">
            <div class="row">
                <div class="card">
                    <Toolbar class="mb-4">
                        <template #start>
                            <Button
                                label="New"
                                icon="pi pi-plus"
                                severity="success"
                                class="btn btn-success px-4 py-2 me-2"
                                @click="createProductDialog = true"
                            />
                            <Button
                                label="Delete"
                                icon="pi pi-trash"
                                severity="danger"
                                class="btn btn-danger px-4 py-2"
                                @click="confirmDeleteSelected"
                                :disabled="
                                    !selectedProducts ||
                                    !selectedProducts.length
                                "
                            />
                        </template>

                        <template #end>
                            <FileUpload
                                mode="basic"
                                accept="image/*"
                                :maxFileSize="1000000"
                                label="Import"
                                chooseLabel="Import"
                                class="btn btn-warning px-4 py-2 me-2"
                            />
                            <Button
                                label="Export"
                                icon="pi pi-upload"
                                severity="help"
                                class="btn btn-secondary px-4 py-2"
                                @click="exportCSV($event)"
                            />
                        </template>
                    </Toolbar>

                    <DataTable
                        ref="dt"
                        :value="props.products"
                        v-model:selection="selectedProducts"
                        dataKey="id"
                        :paginator="true"
                        :rows="10"
                        :filters="filters"
                        paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
                        :rowsPerPageOptions="[5, 10, 25]"
                        currentPageReportTemplate="Showing {first} to {last} of {totalRecords} products"
                        style="height: 500px; overflow-y: scroll"
                    >
                        <template #header>
                            <div
                                class="flex flex-wrap gap-2 align-items-center justify-content-between"
                            >
                                <h4 class="m-0">Manage products</h4>
                                <span class="p-input-icon-left">
                                    <i class="pi pi-search" />
                                    <InputText
                                        v-model="filters['global'].value"
                                        placeholder="Search..."
                                    />
                                </span>
                            </div>
                        </template>

                        <Column
                            field="category"
                            header="Category name"
                            sortable
                            style="min-width: 12rem"
                        ></Column>

                        <Column
                            selectionMode="multiple"
                            style="width: 3rem"
                            :exportable="false"
                        ></Column>
                        <Column
                            field="name"
                            header="Name English"
                            sortable
                            style="min-width: 12rem"
                        ></Column>
                        <Column
                            field="nameAr"
                            header="Name Arabic"
                            sortable
                            style="min-width: 12rem"
                        ></Column>
                        <Column
                            header="Image"
                            style="
                                min-width: 10rem;
                                border-radius: 50%;
                                text-align: right;
                            "
                        >
                            <template #body="slotProps">
                                <img
                                    :src="`${slotProps.data.imageUrl}`"
                                    :alt="slotProps.data.imageUrl"
                                    class="shadow-2 rounded-circle tableImg"
                                    width="100"
                                    height="100"
                                    loading="lazy"
                                />
                            </template>
                        </Column>
                        <Column
                            field="description"
                            header="Description English"
                            sortable
                            style="max-width: 25rem; min-width: 14rem"
                        ></Column>

                        <Column
                            field="descriptionAr"
                            header="Description Arabic"
                            sortable
                            style="max-width: 25rem; min-width: 14rem"
                        ></Column>

                        <Column
                            field="size"
                            header="Size"
                            sortable
                            style="min-width: 12rem"
                        >
                        </Column>
                        <Column
                            field="quantityPerPacket"
                            header="Quantity per Packet"
                            sortable
                            style="min-width: 15rem"
                        ></Column>

                        <Column
                            header="Best Selling"
                            style="
                                min-width: 10rem;
                                border-radius: 50%;
                                text-align: right;
                            "
                        >
                            <template #body="slotProps">
                                <p class="text-start">
                                    {{
                                        slotProps.data.bestSelling == 1
                                            ? "Yes"
                                            : "No"
                                    }}
                                </p>
                            </template>
                        </Column>

                        <Column :exportable="false" style="min-width: 8rem">
                            <template #body="slotProps">
                                <Button
                                    icon="pi pi-pencil"
                                    class="mr-2 mb-2 py-2 rounded-circle bg-secondary text-white"
                                    @click="updateProduct(slotProps.data)"
                                />
                                <Button
                                    icon="pi pi-trash"
                                    severity="danger"
                                    class="mr-2 mb-2 py-2 rounded-circle bg-danger text-white"
                                    @click="
                                        confirmDeleteProduct(slotProps.data)
                                    "
                                    :disabled="trashDisabled"
                                />
                            </template>
                        </Column>
                        <Toast />
                    </DataTable>
                </div>

                <Dialog
                    v-model:visible="deleteProductDialog"
                    :style="{ width: '450px' }"
                    header="Confirm"
                    :modal="true"
                >
                    <div class="d-flex align-items-center confirmation-content">
                        <i
                            class="pi pi-exclamation-triangle mx-3"
                            style="font-size: 2rem"
                        />
                        <span v-if="productToDelete" class="fw-bold"
                            >{{ $t("products.deleteProductSure") }}
                            <b>{{ productToDelete.fullName }}</b>
                        </span>
                    </div>
                    <template #footer>
                        <Button
                            label="No"
                            icon="pi pi-times mx-1"
                            text
                            @click="deleteProductDialog = false"
                            class="mx-4 text-danger"
                        />
                        <Button
                            label="Yes"
                            icon="pi pi-check mx-1"
                            text
                            @click="deleteProduct"
                        />
                    </template>
                </Dialog>
                <Modal
                    :show="createProductDialog"
                    @close="createProductDialog = false"
                >
                    <CreateProduct
                        @close="createProductDialog = false"
                        :categories="categories"
                    />
                </Modal>
                <Modal
                    :show="updateProductDialog"
                    @close="updateProductDialog = false"
                >
                    <UpdateProduct
                        @close="updateProductDialog = false"
                        :product="productToUpdate"
                        :categories="categories"
                    />
                </Modal>

                <Dialog
                    v-model:visible="deleteProducts"
                    :style="{ width: '450px' }"
                    header="Confirm"
                    :modal="true"
                >
                    <div class="confirmation-content">
                        <i
                            class="pi pi-exclamation-triangle mx-3"
                            style="font-size: 2rem"
                        />
                        <span v-if="props.products" class="fw-bold">
                            {{ $t("products.deleteProductsSure") }}
                        </span>
                    </div>
                    <template #footer>
                        <Button
                            label="No"
                            icon="pi pi-times mx-1"
                            text
                            @click="deleteProducts = false"
                            class="mx-4 text-danger"
                        />
                        <Button
                            label="Yes"
                            icon="pi pi-check mx-1"
                            text
                            @click="deleteselectedProducts"
                        />
                    </template>
                </Dialog>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
