@extends('layouts.santri')

@section('content')

<div class="header">
    <h1>Profil Santri</h1>
    <p>Informasi data diri santri</p>
</div>

<div class="profile-card">

    <!-- FOTO PROFIL -->
    <div class="profile-top">

        @if($santri->foto)

            <img
                src="{{ asset('storage/' . $santri->foto) }}"
                class="profile-photo"
            >

        @else

            <div class="profile-image">
                <i class="fa-solid fa-user"></i>
            </div>

        @endif

        <h2>{{ $santri->nama }}</h2>
        <p>Santri</p>

        <br>

        <!-- FORM UPLOAD FOTO -->
        <form action="/upload-foto"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <input type="file"
                   name="foto"
                   required>

            <br><br>

            <button class="save-btn" type="submit">
                Simpan Foto
            </button>

        </form>

    </div>

    <!-- DATA SANTRI -->
    <div class="profile-info">

        <div class="info-item">
            <i class="fa-solid fa-user"></i>

            <div>
                <h4>Nama</h4>
                <p>{{ $santri->nama }}</p>
            </div>
        </div>

        <div class="info-item">
            <i class="fa-solid fa-id-card"></i>

            <div>
                <h4>NIS</h4>
                <p>{{ $santri->nis }}</p>
            </div>
        </div>

        <div class="info-item">
            <i class="fa-solid fa-graduation-cap"></i>

            <div>
                <h4>Kelas</h4>
                <p>{{ $santri->kelas }}</p>
            </div>
        </div>

        <div class="info-item">
            <i class="fa-solid fa-location-dot"></i>

            <div>
                <h4>Alamat</h4>
                <p>{{ $santri->alamat }}</p>
            </div>
        </div>

    </div>

</div>

@endsection

