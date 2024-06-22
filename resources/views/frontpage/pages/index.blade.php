@extends('frontpage.layouts.main')
@section('container')
{{-- Header --}}
@include('frontpage.layouts.img')
{{-- Section --}}
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-black">
            <h1 class="display-4 fw-bolder">Datanglah dengan gaya lama, pulanglah dengan gaya baru</h1>
            <p class="lead fw-normal text-black-50 mt-3">Di barbershop kami, setiap potongan membawa cerita baru</p>
        </div>
    </div>
</section>
{{-- Section --}}

{{-- Footer --}}
@include('frontpage.layouts.footer')
{{-- AOS --}}
@endsection