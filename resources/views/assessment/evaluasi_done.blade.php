@extends('layouts.app')
@section('content')

<section class="section">
    <div class="container">
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card-soft p-5 text-center">

                <div class="display-1 mb-3">
                    ✅
                </div>

                <h2 class="fw-bold">
                    Evaluasi Berhasil Dikirim
                </h2>

                <a href="{{ route('home') }}"
                   class="btn btn-main mt-4">
                    Kembali ke Home
                </a>
            </div>
        </div>
    </div>
</div>

</section>
@endsection
