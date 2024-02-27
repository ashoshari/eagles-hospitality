<script setup>
import { Link, router } from "@inertiajs/vue3";
import { reactive, onMounted, computed, ref } from "vue";
import { useI18n } from "vue-i18n";
import NavLink from "@/Components/NavLink.vue";
import moment from "moment";
import NotificationModal from "../Components/NotificationModal.vue";
const t = useI18n();
const locale = ref(t.locale.value);
const search = defineModel();
const products = reactive([]);
const contacts = reactive([]);
const showNotificationModal = ref(false);
const contact = ref({});
const openSearch = ref(true);
const setLocale = () => {
    locale.value = locale.value === "en" ? "ar" : "en";
    localStorage.setItem("locale", locale.value);

    window.dispatchEvent(
        new CustomEvent("locale-changed", {
            detail: {
                storage: localStorage.getItem("locale"),
            },
        })
    );
    location.reload();
};

onMounted(async () => {
    const response = await fetch("/products");
    const response2 = await fetch("/contacts");

    const data = await response.json();
    const data2 = await response2.json();

    products.push(...data);
    contacts.push(...data2);
});

onMounted(() => {
    const navbar = document.querySelector(".navbar-nav");
    const navy = document.querySelectorAll(".navy");

    const navBarCollapse = document.querySelector(".navbar-collapse");

    navbar.addEventListener("click", (e) => {
        if (e.target.classList.contains("js-scroll-trigger")) {
            $(navBarCollapse).collapse("hide");
        }
    });
    navy.forEach((e) => {
        e.addEventListener("click", (e) => {
            if (e.target.classList.contains("js-scroll-trigger")) {
                $(navBarCollapse).collapse("hide");
            }
        });
    });

    $(document).keyup(function (e) {
        if (e.keyCode == 13) {
            if (!$(e.target).closest(".modal fade in").length) {
                $(".modal").modal("hide");
            }
        }
    });
});

onMounted(() => {
    $(function () {
        $(window).on("scroll", function () {
            if ($(window).scrollTop() > 50) {
                $(".header-top").addClass("hide");
            } else {
                $(".header-top").removeClass("hide");
            }
        });
    });
});

const filteredProducts = computed(() => {
    return products.filter((product) =>
        product?.name
            ?.toLowerCase()
            .includes(search?.value?.toLowerCase() || "")
    );
});

const showContact = (contactToShow) => {
    showNotificationModal.value = true;
    contact.value = contactToShow;
    contactToShow.delivered = true;

    router.put(route("contacts.update", contactToShow.id));
};
</script>

<template>
    <header class="header top-0 fixed-top" style="z-index: 50">
        <NotificationModal @close="showNotificationModal = false" :contact="contact" v-if="showNotificationModal" />
        <aside class="header-top">
            <aside class="d-none d-md-flex justify-content-between p-md-4 bgBlueish text-center">
                <form class="locale-changer">
                    <select v-model="$i18n.locale" @change="setLocale"
                        class="locale-select colorBlueish border-white hoverGrayish cursor-pointer form-select">
                        <option v-for="locale in $i18n.availableLocales" :key="`locale-${locale}`" :value="locale">
                            {{ locale }}
                        </option>
                    </select>
                </form>
                <aside class="top-info ps-2" dir="ltr">
                    <small class="me-3"><i class="fas fa-envelope me-2 text-white"></i><a href="#"
                            class="text-white">zaidghzawi118@gmail.com</a></small>
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-white"></i>
                        <a href="#" class="text-white">Saudi Arabia - Jeddah</a></small>
                </aside>
            </aside>
        </aside>

        <nav class="container-fluid p-0">
            <nav dir="ltr" class="navbar navbar-light bgBlueish navbar-expand-xl p-0 h-100">
                <Link class="navbar-brand p-0" :href="$route('home')">
                <img src="../../../../public/logo.jfif" :alt="locale == 'en' ? 'Website logo' : 'شعار الموقع'"
                    class="logoImg" width="70" height="70" loading="lazy" />
                </Link>

                <button class="navbar-toggler py-2 px-3 m-1" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-white"></span>
                </button>
                <nav class="collapse navbar-collapse  pt-1" id="navbarCollapse">
                    <nav class="navbar-nav mx-auto rounded" :dir="[locale === 'en' ? 'ltr' : 'rtl']">
                        <NavLink :href="$route('home')" class="nav-item nav-link js-scroll-trigger text-white mx-2 fw-bold"
                            :active="$route().current('home')">
                            {{ $t("header.home") }}
                        </NavLink>
                        <NavLink :href="$route('about')" class="nav-item nav-link js-scroll-trigger text-white mx-2 fw-bold"
                            :active="$route().current('about')">
                            {{ $t("header.about") }}
                        </NavLink>
                        <NavLink :href="$route('catalog')"
                            class="nav-item nav-link js-scroll-trigger text-white mx-2 fw-bold"
                            :active="$route().current('catalog')">
                            {{ $t("header.catalog") }}
                        </NavLink>
                        <menu class="dropdown">
                            <NavLink class="nav-item nav-link dropdown-toggle text-white mx-2 fw-bold" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                :href="$route('shop', 'all')">
                                {{ $t("products.shopCategory") }}
                            </NavLink>
                            <menu class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton1">
                                <Link as="button" type="button" :href="$route('skin-care')"
                                    class="dropdown-item border-bottom" :class="[locale === 'en' ? '' : 'text-end']">
                                <a class="fw-bold dropdown-item js-scroll-trigger" href="#">
                                    {{ $t("products.category1") }}
                                </a>
                                </Link>

                                <Link as="button" type="button" :href="$route('personal-care')"
                                    class="dropdown-item border-bottom" :class="[locale === 'en' ? '' : 'text-end']">
                                <a class="fw-bold dropdown-item js-scroll-trigger" href="#">
                                    {{ $t("products.category2") }}
                                </a>
                                </Link>

                                <Link as="button" type="button" :href="$route('body-care')"
                                    class="dropdown-item border-bottom" :class="[locale === 'en' ? '' : 'text-end']">
                                <a class="fw-bold dropdown-item js-scroll-trigger" href="#">
                                    {{ $t("products.category3") }}
                                </a>
                                </Link>

                                <Link as="button" type="button" :href="$route('extra-care')" class="dropdown-item"
                                    :class="[locale === 'en' ? '' : 'text-end']">
                                <a class="fw-bold dropdown-item js-scroll-trigger" href="#">
                                    {{ $t("products.category4") }}
                                </a>
                                </Link>

                                <Link as="button" type="button" :href="$route('towels')" class="dropdown-item"
                                    :class="[locale === 'en' ? '' : 'text-end']">
                                <a class="fw-bold dropdown-item js-scroll-trigger" href="#">
                                    {{ $t("products.category5") }}
                                </a>
                                </Link>

                                <Link as="button" type="button" :href="$route('mattresses')" class="dropdown-item"
                                    :class="[locale === 'en' ? '' : 'text-end']">
                                <a class="fw-bold dropdown-item js-scroll-trigger" href="#">
                                    {{ $t("products.category6") }}
                                </a>
                                </Link>
                            </menu>
                        </menu>
                        <NavLink :href="$route('contact')"
                            class="nav-item nav-link js-scroll-trigger text-white mx-2 fw-bold"
                            :active="$route().current('contact')">
                            {{ $t("header.contact") }}
                        </NavLink>
                        <NavLink class="nav-item nav-link js-scroll-trigger text-white mx-2 fw-bold" type="button"
                            :href="$route('shop')" :active="$route().current('shop')">
                            {{ $t("header.shop") }}
                        </NavLink>

                        <NavLink v-if="!$page.props.auth.user?.name" :href="$route('login')"
                            class="nav-item nav-link js-scroll-trigger text-white mx-2 fw-bold"
                            :active="$route().current('login')">
                            {{ $t("header.login") }}
                        </NavLink>
                        <NavLink v-if="!$page.props.auth.user?.name" :href="$route('register')"
                            class="nav-item nav-link js-scroll-trigger text-white mx-2 fw-bold"
                            :active="$route().current('register')">
                            {{ $t("header.register") }}
                        </NavLink>
                        <NavLink v-if="$page.props.auth.user?.isAdmin" :href="$route('dashboard')"
                            class="nav-item nav-link js-scroll-trigger text-white mx-2 fw-bold"
                            :active="$route().current('dashboard')">
                            Dashboard
                        </NavLink>
                    </nav>
                    <aside class="d-flex align-items-center p-2 rounded">
                        <a class="me-1 bg-light px-2 py-1 rounded-circle text-dark " href="#" data-bs-toggle="modal"
                            data-bs-target="#searchModal">
                            <i class="fas fa-search "></i>
                        </a>

                        <aside class="btn-group" v-if="$page.props.auth.user?.name">
                            <a href="#" class="my-auto"> </a>

                            <button type="button" class="btn colorBlueish hoverColorBlueish" data-bs-toggle="dropdown"
                                aria-expanded="false" v-if="$page.props.auth.user?.isAdmin">
                                <!-- <div
                                    class="text-white rounded-circle bg-orange-400 position-absolute notificationNum"
                                >
                                    {{ contactsUndelivered ? "New" : null }}
                                </div> -->

                                <i class="fa-solid fa-bell fa-2x"></i>
                            </button>
                            <menu class="dropdown-menu notificationDropdown p-0"
                                :class="[locale === 'en' ? 'null' : 'text-end']" v-if="$page.props.auth.user?.isAdmin">
                                <li v-for="contact in contacts"
                                    class="d-flex gap-3 p-2 border-bottom cursorPointer colorBlueish" :class="[
                                        contact.delivered
                                            ? null
                                            : 'unReadContact',
                                    ]" @click="showContact(contact)">
                                    <img :src="contact.imageUrl" :alt="locale == 'en'
                                        ? 'Contact user image'
                                        : 'صورة المستخدم'
                                        " loading="lazy" style="width: 40px; height: 40px" class="rounded-circle"
                                        width="40" height="40" />
                                    <p class="colorBlueish">
                                        {{ contact.username }}
                                    </p>
                                    <small class="ml-auto">
                                        {{
                                            moment(contact.created_at)
                                                .add(3, "hours")
                                                .fromNow()
                                        }}
                                    </small>
                                </li>
                            </menu>

                            <button type="button" class="btn colorBlueish hoverColorBlueish" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-user fa-2x"></i>
                            </button>
                            <ul class="navy dropdown-menu" :class="[
                                locale === 'en' ? 'null' : 'text-end',
                                $page.props.auth.user?.isAdmin
                                    ? 'zIndex50'
                                    : 'zIndex200',
                            ]">
                                <Link as="button" type="button" :href="$route('profile.edit')"
                                    class="fw-bold dropdown-item js-scroll-trigger">
                                {{ $t("profile.title") }}
                                </Link>

                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <Link as="button" type="button" :href="$route('logout')"
                                    class="fw-bold dropdown-item js-scroll-trigger" method="POST">
                                {{ $t("logout.title") }}
                                </Link>
                            </ul>
                        </aside>
                        <div class="locale-changer mx-m-3 hide phone-locale">
                            <select v-model="$i18n.locale" @change="setLocale"
                                class="colorBlueish border-white hoverGrayish cursor-pointer form-select">
                                <option v-for="locale in $i18n.availableLocales" :key="`locale-${locale}`" :value="locale">
                                    {{ locale }}
                                </option>
                            </select>
                        </div>
                    </aside>
                </nav>
            </nav>
        </nav>
    </header>

    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        v-if="openSearch">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <button type="button" class="btn-close p-5" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="modalSearch position-relative input-group w-75 mx-auto">
                        <input type="search" class="form-control p-3" :placeholder="locale == 'en'
                            ? 'Keywords'
                            : 'أدخل كلمات مفتاحية '
                            " aria-describedby="search-icon-1" v-model="search" v-on:keyup.enter="() => {
        if (!search) return;
        router.get($route('product', search));
    }
        " />
                        <span id="search-icon-1" class="input-group-text p-3 bgBlueish text-white"><i
                                class="fa fa-search"></i></span>
                        <div class="filterProducts">
                            <ul class="navy bg-white m-0 mb-4 p-0">
                                <li v-for="product in filteredProducts" class="js-scroll-trigger mt-3 hoverSearchItem"
                                    data-bs-dismiss="modal">
                                    <Link as="button" type="button" :href="$route('product', product.name)"
                                        class="js-scroll-trigger d-flex gap-5 align-items-center w-100 p-4">
                                    <img :src="product.imageUrl" :alt="locale == 'en'
                                        ? 'Product image'
                                        : 'صورة المنتج'
                                        " loading="lazy" class="js-scroll-trigger reviewImg" width="50" height="50" />
                                    <p class="js-scroll-trigger colorBlueish">
                                        {{ product.name }}
                                    </p>
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.zIndex50 {
    left: -50%;
}

.zIndex200 {
    left: -200%;
}

.notificationDropdown {
    left: -330%;
    height: 400px;
    overflow-y: scroll;
    width: 400px;
}

.notificationDropdown li:hover {
    background-color: rgb(227, 230, 236) !important;
}

.notificationNum {
    padding: 0 6px;
    top: -12px;
    left: -4px;
}

.dropdown-item:active {
    background-color: #1a283d;
}

.unReadContact {
    background-color: #ccdcf1;
}

.navbar-toggler:focus {
    box-shadow: none;
}
</style>
