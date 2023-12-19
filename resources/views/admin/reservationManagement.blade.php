@extends('admin/dashboard')
@section('contenx')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Reservation Management</h1>

            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Reservation
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Reservation ID</th>
                                <th>Customer Name</th>
                                <th>Behalf of</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>People</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Reservation ID</th>
                                <th>Customer Name</th>
                                <th>Behalf of</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>People</th>
                                <th>Message</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($reservation as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{$item['phone']}}</td>
                                <td>{{$item['date']}}</td>
                                <td>{{$item['people']}}</td>
                                <td>{{$item['message']}}</td>
                            </tr>
                            @empty

                            <div class="alert alert-danger">
                                Data Reservation belum tersedia
                            </div>
                            @endforelse


                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </main>
</div>
@endsection