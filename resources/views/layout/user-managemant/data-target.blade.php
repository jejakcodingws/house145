@extends('layout/user-managemant/index')

@section('konten-data-target')
<table class="table table-striped table-hover table-target">
    <br>
    <hr>
    <h6 class="text-center">Target sales</h6>
                                    <thead>
                                        <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Kode Target</th>
                                        <th scope="col">Bulan</th>
                                        <th scope="col">Target</th>
                                        <th scope="col">Tanggal Create Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  
                                    @foreach($datatarget as $d)
                                        <tr>
                                        <th  scope="row">{{$loop -> iteration}}</th>
                                        <td>{{$d -> kd_target}}</td>
                                        <td>{{$d -> bulan}}</td>
                                        <td>{{$d -> nominal_target}}</td>
                                        <td>{{$d -> dibuat_kapan}}</td>
                                        </tr>
                                    @endforeach
@endsection