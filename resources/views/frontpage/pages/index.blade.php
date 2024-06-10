@extends('frontpage.layouts.main')
@section('container')
{{-- Header --}}
{{-- @include('frontpage.layouts.header') --}}
{{-- Showcase --}}
{{-- @include('frontpage.components.highlight') --}}
{{-- Showcase --}}
{{-- Section --}}
<img src="/images\bg1.jpg" alt="">
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-black">
            <h1 class="display-4 fw-bolder">Nikmati Kenyamanan dan Keramahan dengan Barbershop Kami</h1>
            <p class="lead fw-normal text-black-50 mb-0">Mantappu Jiwa</p>
        </div>
    </div>
</section>
{{-- Section --}}

{{-- Footer --}}
@include('frontpage.layouts.footer')
{{-- AOS --}}
@endsection