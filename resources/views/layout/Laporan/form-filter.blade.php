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
            <option>Filter Berdasarkan Bulan...</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

</div>

<a style="display: flex; justify-content:center; align-items:center; text-align:center; font-size:30px" href="">
<div >
<i class="fa-solid fa-file-pdf"></i>
</div>
</a>