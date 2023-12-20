@extends('admin/dashboard')
@section('contenx')
<style>
    th, td {
        min-width: 50px;
    }
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Customer Management</h1>

            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable User
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th style="width: fit-content;">No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th style="width: 50px;">Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($member as $item)
                            <tr>
                                <td>{{ $item['id_user'] }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['phone'] }}</td>
                                <td style="word-wrap: break-word; max-width: 150px;"  class="text-wrap">{{$item['address']}}</td>
                                @if($item['active'] == 1)
                                <td><span class="badge badge-pill rounded-pill text-bg-success text-white">Active</span></td>
                                @else
                                <td><span class="badge badge-pill rounded-pill text-bg-danger text-white">Inactive</span></td>
                                @endif
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editCustomer{{ $item['id_user'] }}" style="height: 25px; padding: 2px; padding-right: 8px; padding-left :5px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="currentColor" class="bi bi-pencil-fill mx-1" viewBox="-1 2 14 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg>
                                                
                                            </button>
                                        </div>
                                        <div class="col-md-5">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('customer.destroy', $item->id_user)}}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm btn-danger mx-1 " type="submit" style="height: 25px; padding: 2px; padding-right: 8px; padding-left :5px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" fill="currentColor" class="bi bi-trash mx-1" viewBox="0 2 14 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                    </svg>
                                                    
                                                </button>
                                            </form>

                                        </div>
                                        <div class="modal fade" id="editCustomer{{ $item['id_user'] }}" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form action="{{ route('customer.update', $item['id_user']) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmationModalLabel">Edit Customer</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="p-2">
                                                                <label for="name" class="form-label">Full Name</label>
                                                                <input id="name" name="name" type="text" class="form-control" placeholder="Name" value="{{ $item['name'] }}" required>
                                                            </div>
                                                            <div class="p-2">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ $item['email'] }}" required>
                                                            </div>

                                                            <div class="p-2">
                                                                <label for="telp" class="form-label">Phone Number</label>
                                                                <input id="telp" name="phone" type="number" class="form-control" placeholder="Telp" required value="{{ $item['phone'] }}">
                                                            </div>
                                                            <div class="p-2">
                                                                <label for="address" class="form-label">Address</label>
                                                                <textarea id="address" style="width: 100%; height: 100px;" placeholder="Deskripsi Makanan" class="form-control" name="address" required>{{ $item['address'] }}</textarea>
                                                            </div>
                                                            <div class="p-2">
                                                                <label for="inputKategori" class="form-label">Status</label>
                                                                <select id="inputKategori" class="form-select" name="active" required>
                                                                    <option value='1' @selected($item['active']==1 )>Active</option>
                                                                    <option value='0' @selected($item['active']==0 )>Inactive</option>
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
                                </td>

                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data Customer belum tersedia
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