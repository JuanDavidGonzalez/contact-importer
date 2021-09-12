@extends('adminlte::page')


@section('content_header')
    <h1>Contacts</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My Contacts</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th>Birthday</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Credit Card</th>
                            <th>Franchise</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($contacts as $contact)
                        <tr>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->birthday}}</td>
                            <td>{{$contact->phone}}</td>
                            <td>{{$contact->address}}</td>
                            <td>{{$contact->card}}</td>
                            <td>{{$contact->franchise->name}}</td>
                            <td>{{$contact->email}}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center"> <span class="p-1 alert alert-warning">No contacts to display!</span></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $contacts->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
