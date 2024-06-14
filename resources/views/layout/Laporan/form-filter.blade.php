<div class="filter">
    <!-- Tampilkan pesan success jika ada -->
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
<form action="{{ route('filterRpendapatan') }}" method="GET">
<div class="form-group">
            <select id="bulan" name="bulan" class="form-control" required>
                <option value="">Filter Berdasarkan Bulan...</option>
                <option value="01" {{ request('bulan') == '01' ? 'selected' : '' }}>Januari</option>
                <option value="02" {{ request('bulan') == '02' ? 'selected' : '' }}>Februari</option>
                <option value="03" {{ request('bulan') == '03' ? 'selected' : '' }}>Maret</option>
                <option value="04" {{ request('bulan') == '04' ? 'selected' : '' }}>April</option>
                <option value="05" {{ request('bulan') == '05' ? 'selected' : '' }}>Mei</option>
                <option value="06" {{ request('bulan') == '06' ? 'selected' : '' }}>Juni</option>
                <option value="07" {{ request('bulan') == '07' ? 'selected' : '' }}>Juli</option>
                <option value="08" {{ request('bulan') == '08' ? 'selected' : '' }}>Agustus</option>
                <option value="09" {{ request('bulan') == '09' ? 'selected' : '' }}>September</option>
                <option value="10" {{ request('bulan') == '10' ? 'selected' : '' }}>Oktober</option>
                <option value="11" {{ request('bulan') == '11' ? 'selected' : '' }}>November</option>
                <option value="12" {{ request('bulan') == '12' ? 'selected' : '' }}>Desember</option>
            </select>
        </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

</div>

<div class="downloadPDF" style="display:  flex; width:auto; justify-content:flex-start; align-items:center; text-align:right;">
@if(isset($bulan))
        <form style="display:flex; justify-content:end;" action="{{ route('downloadPDF') }}" method="POST">
            @csrf
            <input type="hidden" name="bulan" value="{{ $bulan }}">
            <button class="bg-warning" type="submit"><span>Download</span><i class="fa-solid fa-file-pdf pl-2 "></i></button>
        </form>
@endif
</div>