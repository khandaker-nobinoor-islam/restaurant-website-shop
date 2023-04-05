@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Reservation</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S/L</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Date & Time</th>
                            <th>Person</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $key=>$reservation)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $reservation->name }}</td>
                                <td>{{ $reservation->phone }}</td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->date_time }}</td>
                                <td>{{ $reservation->person }}</td>
                                <td>{{ $reservation->message }}</td>
                                <td>
                                    @if ($reservation->status == 1)
                                        <span class="btn btn-success">Confirmed</span>
                                    @endif
                                    @if ($reservation->status == 0)
                                        <span class="btn btn-danger">Waiting</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($reservation->status == 0)
                                        <form id="status-form-{{ $reservation->id }}" action="{{ route('reservation.status', $reservation->id) }}" method="POST">
                                            @csrf
                                        </form>
                                        <button class="btn btn-danger float-end" type="button"
                                        onclick="if(confirm('are you verify this by phone?')){
                                            event.preventDefault();
                                            document.getElementById('status-form-{{ $reservation->id }}').submit();
                                        }else{
                                            event.preventDefault();
                                        }">confirm</button>
                                    @endif
                                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                                    <form id="delete-form-{{ $reservation->id }}"
                                        action="{{ route('reservation.destroy', $reservation->id) }}" method="POST">
                                        @csrf
                                    </form>
                                    <button class="btn btn-danger" type="button"
                                        onclick="if(confirm('are you sure to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $reservation->id }}').submit();
                            }else{
                                event.preventDefault();
                            }">Delete</button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
