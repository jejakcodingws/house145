@extends('layout.site-karyawan.index')

@section('konten-dashboard-absen')

<style>
    table thead tr th {
        font-size: 9px;
    }
    table tbody tr td {
        font-size: 9px;
    }
    form .row label {
        font-size: 12px;
    }
    .map {
        width: 100%;
        height: 200px;
    }
</style>
<div class="content-wrapper" style=;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                @include('flash-message')
            </div>
            
            <h5 class="text-center">ABSEN KARYAWAN</h5>
            <form action="{{ route('simpan-data-absensi') }}" method="post" class="form-absensi">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="for_nik_karyawan" class="form-label">Nama</label>
                            <div class="input-group mb-3">
                                <select class="form-select" name="for_nik_karyawan" id="for_nik_karyawan">
                                    <option selected>Choose ...</option>
                                    @foreach($dataKaryawan as $d)
                                        <option value="{{ $d->nik_karyawan }}">{{ $d->nik_karyawan }} | {{$d->nama}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('for_nik_karyawan'))
                                    <div style="background-color: red;" class="badge text-bg-danger">{{ $errors->first('for_nik_karyawan') }}</div>
                                @endif
                            </div>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <input type="hidden" name="device_type" id="device_type">
                        </div>
                     
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <div class="col">
                    <h6 class="text-center">Absensi Berhasil</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>HARI</th>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>JAM MASUK</th>
                                <th>JAM PULANG</th>
                                <th>KETERANGAN</th>
                                <th>STATUS ABSEN</th>
                                <th style="display: none;">LATITUDE</th>
                                <th style="display: none;">LONGITUDE</th>
                                <th>LOKASI</th>
                                <th>MAP</th>
                                <th>DEVICE TYPE</th> <!-- Tambahkan kolom untuk Device Type -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataAbsen as $absen)
                                <tr>
                                    <td>{{ $absen->hari }}</td>
                                    <td>{{ $absen->nik_karyawan }}</td>
                                    <td>{{ $absen->nama }}</td>
                                    <td>{{ $absen->jam_masuk }}</td>
                                    <td>{{ $absen->jam_keluar }}</td>
                                    <td>{{ $absen->keterangan_absen }}</td>
                                    <td>{{ $absen->status_absen }}</td>
                                    <td style="display: none;">{{ $absen->latitude }}</td>
                                    <td style="display: none;">{{ $absen->longitude }}</td>
                                    <td>{{ $absen->device_type }}</td>
                                    <td>
                                        <textarea style="display: flex; width:25vh; height:35vh;" id="location_details_{{ $absen->id }}" class="form-control" rows="3" readonly></textarea>
                                    </td>
                                    <td>
                                        <div style="width: 20vh;  height:35vh;" id="map_{{ $absen->id }}" class="map"></div>
                                    </td>
                                    <!-- Tampilkan device type -->
                                </tr>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat={{ $absen->latitude }}&lon={{ $absen->longitude }}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                const address = data.address;
                                                const locationDetails = `
                                                    ${address.road || ''}, 
                                                    ${address.village || address.suburb || ''}, 
                                                    ${address.city_district || address.city || ''}, 
                                                    ${address.region || ''}, 
                                                    ${address.postcode || ''}, 
                                                    ${address.country || ''}
                                                `;
                                                document.getElementById('location_details_{{ $absen->id }}').value = locationDetails;
                                            })
                                            .catch(error => {
                                                console.error('Error fetching location details:', error);
                                            });

                                        // Initialize Leaflet map
                                        const map = L.map('map_{{ $absen->id }}').setView([{{ $absen->latitude }}, {{ $absen->longitude }}], 15);
                                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                        }).addTo(map);
                                        L.marker([{{ $absen->latitude }}, {{ $absen->longitude }}]).addTo(map)
                                            .bindPopup('Lokasi Absen')
                                            .openPopup();
                                    });
                                </script>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            document.querySelector('input[name="latitude"]').value = latitude;
            document.querySelector('input[name="longitude"]').value = longitude;

            const deviceType = navigator.userAgent;
            document.querySelector('input[name="device_type"]').value = deviceType;

            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latitude}&lon=${longitude}`)
                .then(response => response.json())
                .then(data => {
                    const address = data.address;
                    const locationDetails = `
                        ${address.road || ''}, 
                        ${address.village || address.suburb || ''}, 
                        ${address.city_district || address.city || ''}, 
                        ${address.region || ''}, 
                        ${address.postcode || ''}, 
                        ${address.country || ''}
                    `;
                    document.getElementById('location_details').value = locationDetails;
                })
                .catch(error => {
                    console.error('Error fetching location details:', error);
                });
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
    });
</script>

@endsection
