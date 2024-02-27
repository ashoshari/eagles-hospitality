<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
const locale = ref(localStorage.getItem("locale"));
onMounted(() => {
	window.addEventListener("locale-changed", (event) => {
		locale.value = event.detail.storage;
	});
});
</script>

<template>
	<Head :title="locale == 'en' ? 'About us' : 'نبذة عنا'" />
	<section class="banner-area marginTopHalf" id="home">
		<div class="container">
			<div class="row fullscreen d-flex  justify-content-center">
				<div class="banner-content marginTopHalf text-center col-lg-10">
					<h1 class="text-white display-3 fw-bold mb-4">
						{{ $t("header.company") }}

					</h1>
					<a href="#" class="primary-btn px-5 py-2 rounded-pill text-uppercase"> {{ $t("shopNow.title") }}
					</a>
					<img class=" aboutusbg" src="../../../public/aboutusbg.jpg" alt="company features" width="800"
						height="600" loading="lazy">
				</div>
			</div>
		</div>
	</section>
	<section class="bigMargin section-gap" id="about">
		<div class="container">
			<div class="row justify-content-center align-items-center ">
				<div class="col-lg-5 video-left ">
					<!-- <h6 class=" text-primary fw-light">Brand new app to blow your mind</h6>
					<h1 class="mb-3">We’ve made a life <br>
						that will change you</h1>
					<p><span class="fw-bold">We are here to listen from you deliver exellence</span></p> -->
					<p class="aboutusp">
						{{ $t("aboutus.about1") }}
					</p>
					<Link :href="$route('shop', 'all')" class="primary-btn px-4 py-1 rounded-pill" href="#"> {{
						$t("shopNow.title") }}
					</Link>
				</div>
				<div class="mt-5 col-lg-6 video-right justify-content-center align-items-center d-flex">
					<div class="overlay overlay-bg"></div>
					<a class="play-btn" href="https://www.youtube.com/watch?v=ARA0AxrnHdM"><img width="500" height="400"
							loading="lazy" class=" aboutusImg img-fluid" src="../../../public/abousus1.jpg" alt="hotel"></a>
				</div>
			</div>
		</div>
	</section>
	<section class="top-course-area section-gap marginTopHalf">
		<div class="container">
			<!-- <div class="row d-flex justify-content-center">
				<div class="menu-content  col-lg-10">
					<div class="title text-center">
						<h1 class="mb-10">Top Courses That are open for Students</h1>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
				</div>
			</div> -->
			<div class="mt-5 row justify-content-center align-items-center">
				<div class="col-lg-3 course-left">
					<div class="single-course">
						<span class="lnr lnr-rocket"></span>
						<a href="#">
							<h4>{{ $t("hotelEq.title") }}</h4>
						</a>
						<p>
							{{ $t("hotelEq.par") }}

						</p>
					</div>
					<div class="single-course">
						<span class="lnr lnr-cog"></span>
						<a href="#">
							<h4>{{ $t("highQuality.title") }}</h4>
						</a>
						<p>
							{{ $t("highQuality.par") }}
						</p>
					</div>
				</div>
				<div class="col-lg-6 course-middle">
					<img class="rounded img-fluid mx-auto d-block" src="../../../public/featuresImg.jpg"
						alt="hotels supplies and equipments" width="500" height="400" loading="lazy">
				</div>
				<div class="col-lg-3 course-right">
					<div class="mt-4 single-course">
						<span class="lnr lnr-apartment"></span>
						<a href="#">
							<h4>{{ $t("suitablePrices.title") }}</h4>
						</a>
						<p>
							{{ $t("suitablePrices.par") }}
						</p>
					</div>
					<div class="single-course">
						<span class="lnr lnr-phone"></span>
						<a href="#">
							<h4> {{ $t("delivery.title") }}
							</h4>
						</a>
						<p>
							{{ $t("delivery.par") }}
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="marginTopHalf home-about-area pb-5">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6 p-0 home-about-left">
					<img class="img-fluid" src="../../../public/aboutus2.jpg" alt="warehouse" width="700" height="467"
						loading="lazy">
				</div>
				<div class="col-lg-6 px-5 home-about-right">
					<!-- <h1 class="mb-4">Globally Connected <br>
						by Large Network</h1>
					<p>
						<span class="fw-bold">We are here to listen from you deliver exellence</span>
					</p> -->
					<p>
						{{ $t("aboutus.about2") }}

					</p>
					<Link :href="$route('shop', 'all')" class="primary-btn px-4 py-1 rounded-pill" href="#">
					{{ $t("shopNow.title") }}
					</Link>

				</div>
			</div>
		</div>
	</section>
</template>


