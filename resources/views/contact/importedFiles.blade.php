@extends('adminlte::page')


@section('content_header')
    <h1>Imported Files</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Imported Files</h3>
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                                {{session('status')}}
                        </div>
                    @endif
                    @if(isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                   <li> {{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include('contact.import')

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>FileName</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($files as $file)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="7"> <span class="p-1 alert alert-warning">No imported files to display!</span></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            bsCustomFileInput.init()
        });
    </script>
@stop
