@extends('adminlte::page')
@section('title','Usuarioes')
    
@section('content')

    <br>
            <div style=" background-color:#1466C3; color:#fff"  class="bg text-white p-2 mb-2 rounded-top">
                    <h3 class="text-center">Usuarios</h3>
                </div>
            </div>
            <div class="box-body">
                <table id="table-data" class="table table-bordered">
                    <thead style=" background-color:#1466C3; color:#fff">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th></th>
                            
                            <th style="width:22%; height:22%;" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody style=" background-color:rgb(255,255,255)" >
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario['name']}}</td>
                            <td>{{$usuario['email']}}</td>
                            <td>{{$usuario['rol']}}</td>

                            <td>
                                <a href="{{route('nuevo.usuario',['id' => $usuario['id']])}}" class="btn btn-success btn-sm rounded-8">
                                    <span class=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPdJREFUSEvVldERgkAMRLOdYCfSiVaiVqKdSClnJdFlgImR4wLCB/fDMBz7ktzOHmTjhY31ZTWAqt5F5AXgaov+AqjqUUS4sSp0VgNo+j2d+Kl7v1mIBzxFhJCp5cVZDP+zRQ0QD1Aq41NC5GxUtQKQ+HSQM4BHq2WFVDUM6MbCbtmRhbD6VnwxwM089ZCxrmd34MR7zQTg8DcgI07dYeYeEu4gKk6rWwuHAHPE6SbrwiIgKs7RjLkwAmit69bozNcCZA90DUBWfPGIIpFhQu8nCYpnsDtAJK5LTTUA6lzYMR0vgTshB2Hw0QjDZRTK/VLJU9/3D3gDazjBGbL5ohcAAAAASUVORK5CYII="/> Editar</span>
                                </a>
                            </td>
                            <td>
                                <a>
                                <form action="{{route('eliminar.usuario',['id' => $usuario['id']])}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-8">
                                        <span class=""><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAJRJREFUSEvtlcENgCAMRfs301GcRJ1MRnGTag8kSoBaAh6UHhvyX/uBFtQ40FifVAAzD0S0JQpZASy5IrMARVx0dyKaALgU5AZgZq5hGc62vM67gBrVhxrROyi16mpN1CKf/BbAtx12FcsXWdQB6jPtFv3AIssAtHw02WCyySzhAIxPp6mIzwZIcrOpO9nSQuxsc8ABQHeaGbkbfj0AAAAASUVORK5CYII="/> Eliminar</span>
                                    </button>
                                </form>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@endsection

@section('js')
<script>
    $('#table-data').DataTable({
         "scrollX": true
    });
</script>
 @stop