@extends('layout/user-managemant/index')

@section('konten-data-target')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <table style="font-size: 10px;" class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Delete user</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  
                                    @foreach($datauser as $d)
                                        <tr>
                                        <th scope="row">{{$loop -> iteration}}</th>
                                        <td>{{$d -> name}}</td>
                                        <td>{{$d -> email}}</td>
                                        <td>{{$d -> level}}</td>
                                        <td>
                                        <a href="{{route('delete-user', ['id' => $d->id])}}" class="btn" 
                                            onclick="return confirm('Apakah anda yakin ingin menghapus : {{$d-> name}} ?')">
                                            <i class="fa-solid fa-trash" style="color: #ed0707;"></i>
                                            </a>
                                        </td>
                                
                                        </tr>
                                    @endforeach
                                  
                                       
                                    
                                                                                
                   
                        </tbody>
                        </table>

                            </div>
@endsection
                    