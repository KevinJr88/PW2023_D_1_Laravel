@extends('admin/dashboard')
@section('contenx')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Order Management</h1>

            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Order
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Order Date</th>
                                <th>Order Detail</th>
                                <th>Order Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Order Date</th>
                                <th>Order Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($order as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <!-- <td>{{ $item->user->id_user }}</td> -->
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item['created_at'] }}</td>
                                <td>
                                    @php
                                    $details = $item->cart->detailCart;
                                    $totalPrice = 0;
                                    @endphp
                                    @foreach( $details as $detail)
                                    <p>{{$detail->menu->name}} - {{$detail->quantity}}</p>
                                        @php
                                        
                                        $totalPrice += $detail->menu->price * $detail->quantity;
                                        @endphp
                                    @endforeach
                                </td>
                                <td>{{$totalPrice}}</td>
                                <td>
                                    <!-- {{ $item['status'] }} -->
                                    <h6>
                                        @if ($item['status'] == 'Process')
                                        <span class="badge badge-pill rounded-pill text-bg-warning text-white">Process</span>
                                        @elseif ($item['status'] == 'Success')
                                        <span class="badge badge-pill rounded-pill text-bg-success text-white">Success</span>
                                        @elseif ($item['status'] == 'Canceled')
                                        <span class="badge badge-pill rounded-pill text-bg-danger text-white">Canceled</span>
                                        @endif
                                    </h6>
                                </td>
                                <td>
                                    <div class="">
                                        <button type="button" class="btn btn-sm btn-primary " data-bs-toggle="modal" data-bs-target="#editStatus{{ $item['id'] }}" style="height: 25px; padding: 2px; padding-right: 8px; padding-left :5px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="currentColor" class="bi bi-pencil-fill mx-1" viewBox="-1 2 14 16">
                                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                            </svg>
                                            Update
                                        </button>
                                    </div>
                                </td>
                                <div class="modal fade" id="editStatus{{ $item['id'] }}" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('order.edit', $item['id']) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmationModalLabel">Edit Status</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">


                                                    <div class="p-2">
                                                        <select id="inputKategori" class="form-select" name="status" required>

                                                            <option value="Canceled" @selected($item['status']=='Canceled' )>Canceled</option>
                                                            <option value="Process" @selected($item['status']=='Process' )>Process</option>
                                                            <option value="Success" @selected($item['status']=='Success' )>Success</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success" id="confirmReservation">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @empty

                            <div class="alert alert-danger">
                                Data Order belum tersedia
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