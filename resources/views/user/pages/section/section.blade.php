@extends('user.app')
@section('title','Ogani')
@section('section_main')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            @include('user.pages.section.section-hero')
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            @include('user.pages.section.section-categories')
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            @include('user.pages.section.section-featured')
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            @include('user.pages.section.section-banner')
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            @include('user.pages.section.section-lastest-product')
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            @include('user.pages.section.section-from-blog')
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
