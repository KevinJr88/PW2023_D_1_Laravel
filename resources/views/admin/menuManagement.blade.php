@extends('admin/dashboard')
@section('contenx')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Menu Management</h1>

            </div>

            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addMenu">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle mx-1" viewBox="0 0 17 17">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg><strong>ADD</strong>
            </button>
            <br>
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Menu
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Item Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Item Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($menu as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['category'] }}</td>
                                <td>{{ $item['price'] }}</td>
                                <td><img src=" {{ asset($item['image']) }}" style="width:100px; height:100px; "></td>
                                <td>{{ $item['stock'] }}</td>
                                <td>{{ $item['desc'] }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editMenu{{ $item['id'] }}" style="height: 25px; padding: 2px; padding-right: 8px; padding-left :5px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" fill="currentColor" class="bi bi-pencil-fill mx-1" viewBox="-1 2 14 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                </svg>

                                            </button>
                                        </div>
                                        <div class="col-md-5">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('menu.destroy', $item->id)}}" method="POST">
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



                                    </div>
                                    <div class="modal fade" id="editMenu{{ $item['id'] }}" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('menu.update', $item['id'] ) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmationModalLabel">Edit Menu</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="p-2">
                                                            <label for="name" class="form-label">Food Name</label>
                                                            <input id="name" name="name" type="text" class="form-control" placeholder="Food Name" value="{{ $item['name'] }}" required>
                                                        </div>
                                                        <div class="p-2">
                                                            <label for="inputKategori" class="form-label">Category</label>
                                                            <select id="inputKategori" class="form-select" name="category" required>

                                                                <option value="Burger" @selected($item['category']=='Burger' )>
                                                                    Burger</option>
                                                                <option value="Pizza" @selected($item['category']=='Pizza' )>Pizza
                                                                </option>
                                                                <option value="Noodle" @selected($item['category']=='Noodle' )>
                                                                    Noodle</option>
                                                                <option value="Steak" @selected($item['category']=='Steak' )>Steak
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="p-2">
                                                            <label for="price" class="form-label">Price</label>
                                                            <input id="price" type="number" name="price" class="form-control" placeholder="Price" required value="{{ $item['price'] }}">
                                                        </div>
                                                        <div class="p-2">
                                                            <div class="input-group">
                                                                <input type="file" class="form-control" name="image" id="inputGambar" value="{{ $item->image }}">
                                                                <label class="input-group-text" for="inputGambar">Food Picture</label>
                                                            </div>
                                                        </div>
                                                        <div class="p-2">
                                                            <label for="stock" class="form-label">Stock</label>
                                                            <input id="stock" name="stock" type="number" class="form-control" placeholder="Stock" required value="{{ $item['stock'] }}">
                                                        </div>
                                                        <div class="p-2">
                                                            <label for="inputDeskripsi" class="form-label">Description</label>

                                                            <textarea id="inputDeskripsi" style="width: 100%; height: 100px;" placeholder="Deskripsi Makanan" class="form-control" name="desc" required>{{ $item['desc'] }}</textarea>
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
                                Data Menu belum tersedia
                            </div>
                            @endforelse


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">ADD Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="p-2">
                                <input id="name" name="name" type="text" class="form-control" placeholder="Food Name" required>
                            </div>
                            <div class="p-2">
                                <select id="inputKategori" class="form-select" name="category" required>
                                    <option selected value="" disabled hidden>Choose Category</option>
                                    <option value="Burger">Burger</option>
                                    <option value="Pizza">Pizza</option>
                                    <option value="Noodle">Noodle</option>
                                    <option value="Steak">Steak</option>
                                </select>
                            </div>
                            <div class="p-2">
                                <input id="price" name="price" type="number" class="form-control" placeholder="price" required>
                            </div>
                            <div class="p-2">
                                <div class="input-group">
                                    <input type="file" class="form-control" name="image" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Food Picture</label>
                                </div>
                            </div>
                            <div class="p-2">
                                <input id="stock" name="stock" type="number" name="stock" class="form-control" placeholder="Stock" required>
                            </div>
                            <div class="p-2">
                                <textarea id="inputDeskripsi" cols="30" rows="3" placeholder="Description" class="form-control" name="desc" required></textarea>
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
    </main>
</div>
@endsection