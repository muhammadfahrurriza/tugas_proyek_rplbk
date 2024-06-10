<div class="card mb-3" style="width: 15rem;">
    <!-- Product image-->
    <img class="card-img-top" src="/images\logo.jpg" alt="..." />
    {{-- <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." /> --}}
    <!-- Product details-->
    <div class="card-body p-4">
        <div class="text-center">
            <!-- Product name-->
            <h5 class="fw-bolder">{{ $paket->nama_paket }}</h5>
            <h6 >{{ $paket->keterangan_paket }}</h6>
            <!-- Product price-->
            Rp. {{ $paket->harga }}
        </div>
    </div>
    <!-- Product actions-->
    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        <div class="text-center"><button class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#beliModal{{ $paket->id }}">Pesan</button></div>
    </div>
</div>