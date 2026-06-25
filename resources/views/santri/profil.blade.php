@extends('layouts.santri')

@section('content')

<div class="content">

    <!-- HEADER -->
    <div class="header">
        <h1>Profil Santri</h1>
        <p>Informasi data diri santri</p>
    </div>

    <!-- PROFILE CARD -->
    <div class="table-card profile-card">

        <div class="profile-wrapper" style="display:flex; gap:30px; flex-wrap:wrap;">

            <!-- LEFT: FOTO + UPLOAD -->
            <div class="profile-top" style="flex:1; min-width:260px; text-align:center;">

                @if($santri->foto)
                    <img
                        src="{{ asset('storage/' . $santri->foto) }}"
                        alt="Foto Santri"
                        style="width:150px;height:150px;border-radius:50%;object-fit:cover;border:4px solid var(--gold);"
                    >
                @else
                    <div style="width:150px;height:150px;border-radius:50%;background:#e2e8f0;display:flex;align-items:center;justify-content:center;margin:auto;font-size:40px;color:var(--gray);border:4px solid var(--gold);">
                        <i class="fa-solid fa-user"></i>
                    </div>
                @endif

                <h2 style="margin-top:15px;">{{ $santri->nama }}</h2>
                <p style="color:var(--gray);">Santri</p>

                <!-- UPLOAD FOTO -->
                <form action="/upload-foto" method="POST" enctype="multipart/form-data" style="margin-top:20px;">
                    @csrf

                    <input
                        type="file"
                        name="foto"
                        accept="image/*"
                        required
                    >

                    <button type="submit" class="btn" style="margin-top:15px;width:100%;">
                        Simpan Foto
                    </button>
                </form>

            </div>

            <!-- RIGHT: DATA SANTRI -->
            <div class="profile-info" style="flex:2; min-width:300px;">

                <div class="info-item" style="display:flex;gap:15px;align-items:center;padding:12px 0;border-bottom:1px solid #e5e7eb;">
                    <i class="fa-solid fa-user" style="color:var(--gold);font-size:18px;"></i>
                    <div>
                        <h4 style="margin:0;color:var(--gray);font-size:14px;">Nama</h4>
                        <p style="margin:0;font-weight:600;">{{ $santri->nama }}</p>
                    </div>
                </div>

                <div class="info-item" style="display:flex;gap:15px;align-items:center;padding:12px 0;border-bottom:1px solid #e5e7eb;">
                    <i class="fa-solid fa-id-card" style="color:var(--gold);font-size:18px;"></i>
                    <div>
                        <h4 style="margin:0;color:var(--gray);font-size:14px;">NIS</h4>
                        <p style="margin:0;font-weight:600;">{{ $santri->nis }}</p>
                    </div>
                </div>

                <div class="info-item" style="display:flex;gap:15px;align-items:center;padding:12px 0;border-bottom:1px solid #e5e7eb;">
                    <i class="fa-solid fa-graduation-cap" style="color:var(--gold);font-size:18px;"></i>
                    <div>
                        <h4 style="margin:0;color:var(--gray);font-size:14px;">Kelas</h4>
                        <p style="margin:0;font-weight:600;">{{ $santri->kelas }}</p>
                    </div>
                </div>

                <div class="info-item" style="display:flex;gap:15px;align-items:center;padding:12px 0;">
                    <i class="fa-solid fa-location-dot" style="color:var(--gold);font-size:18px;"></i>
                    <div>
                        <h4 style="margin:0;color:var(--gray);font-size:14px;">Alamat</h4>
                        <p style="margin:0;font-weight:600;">{{ $santri->alamat }}</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection