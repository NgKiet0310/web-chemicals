@extends('client.layouts.app')

@section('title', 'About Us - YourBrand')

@section('body-class', 'about-page')

@section('content')
<section class="about-intro section py-5">
    <div class="container text-center">
        <h1 class="mb-4 fw-bold">Về chúng tôi</h1>
        <div class="banner-wrapper d-inline-block shadow-sm rounded-3 overflow-hidden">
            <img src="{{ asset('assets/img/banner.png') }}" 
                 alt="Banner" 
                 class="img-fluid"
                 style="width: 100%; height: auto; border-radius: 20px;">
        </div>
    </div>
</section>
@endsection
