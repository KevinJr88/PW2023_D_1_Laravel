@extends('UserView.dashboard') @section('content')
<style>
.bg-glass {
    background-color: rgba(0, 0, 0, 0.1) !important;
    box-shadow: 0 0 10px #000;
}

.form {
    font-size: 1.2em;
}
    #imageContainer {
        position: relative;
        width: 300px;
        height: 300px;
        overflow: hidden;
        border-radius: 50%;
    }

    #imageOverlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        color: #fff;
        display: none;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    #imageOverlay:hover {
        background-color: rgba(0, 0, 0, 0.7);
    }

    #imageOverlay span {
        text-align: center;
    }
</style>
<div class="container-xxl py-5 bg-dark hero-header mb-5">

    <section>
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10"></div>
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass">
                        <div class="card-body px-3  px-md-4">
                            <div class="mx-auto" id="imageContainer">
                                <img id="userImage" src="{{ asset($user->image) }}" alt="" class="img-fluid h-100">
                                    <div id="imageOverlay" onclick="triggerImageUpload()">
                                        <span>Edit</span>
                                    </div>
                            </div>
                            <form class="mt-3" id="profileForm" class="post" action="{{route('profile.update', $user->id_user)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="file" id="imageInput" name="image" style="display: none;" accept="image/*" onchange="displayImage()">
                                <div class="form-floating mb-2 py-1">
                                    <input type="text" name="name" class="form-control" id="floatingInputNama"
                                        placeholder="Nama" value="{{$user->name}}" required disabled/>
                                    <label for="floatingInputNama">Full Name</label>
                                </div>
                                <div class="form-floating mb-2 py-1">
                                    <input type="text" name="username" class="form-control" id="floatingInputUsername"
                                        placeholder="Username" required value="{{$user->username}}" disabled/>
                                    <label for="floatingInputUsername">Username</label>
                                </div>
                                <div class="form-floating mb-2 py-1">
                                    <input type="email" name="email" class="form-control" id="floatingInputEmail"
                                        placeholder="Email" required value="{{$user->email}}" disabled/>
                                    <label for="floatingInputEmail">Email</label>
                                </div>
                                <div class="form-floating mb-1 py-1">
                                    <input type="number" name="phone" class="form-control" id="floatingInputPhone"
                                        placeholder="Telepon" required style="width: 100%;" value="{{$user->phone}}" disabled/>
                                    <label for="floatingInputPhone">Phone Number</label>
                                </div>
                                <div class="form-floating mb-1 py-1">
                                    <input type="address" name="address" class="form-control" id="floatingInputAddress"
                                        placeholder="Address" required value="{{$user->address}}" disabled/>
                                    <label for="floatingInputAdress">Address</label>
                                </div>

                                <button id="editButton" type="button" style="width: 100%;"
                                    class="btn btn-block btn-primary mt-4 py-2 mb-5" onclick="toggleEditSave('editButton', 'saveButton')">
                                    Edit
                                </button>
                                <button id="saveButton" type="submit" style="width: 100%; display: none;"
                                    class="btn btn-block btn-primary mb-1 mt-3 py-2 ">
                                    Save
                                </button>
                                <button id="cancelButton" type="button" style="width: 100%; display: none;"
                                    class="btn btn-square btn-secondary  mb-1 mt-3 py-2" onclick="cancelEdit('editButton', 'saveButton', 'cancelButton')">
                                    Cancel
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>
<script>
    var initialName = "{{ $user->name }}";
    var initialUsername = "{{ $user->username }}";
    var initialEmail = "{{ $user->email }}";
    var initialPhone = "{{ $user->phone }}";
    var initialAddress = "{{ $user->address }}";
    var initialImage = "{{ $user->image }}";

    function toggleEditSave(showButton, hideButton) {
        var showBtn = document.getElementById(showButton);
        var hideBtn = document.getElementById(hideButton);
        var cancelBtn = document.getElementById('cancelButton');
        var form = document.getElementById('profileForm');
        var inputs = form.querySelectorAll('input');

        for (var i = 0; i < inputs.length; i++) {
            inputs[i].removeAttribute('disabled');
        }

        showBtn.style.display = 'none';
        hideBtn.style.display = 'block';
        cancelBtn.style.display = 'block';
        document.getElementById('imageOverlay').style.display = 'flex';
    }

    function triggerImageUpload() {
        var imageInput = document.getElementById('imageInput');
        imageInput.click();
    }

    function cancelEdit(editButton, saveButton, cancelButton) {
        var editBtn = document.getElementById(editButton);
        var saveBtn = document.getElementById(saveButton);
        var cancelBtn = document.getElementById(cancelButton);
        var form = document.getElementById('profileForm');
        var inputs = form.querySelectorAll('input');
        var userImage = document.getElementById('userImage');
        var imageOverlay = document.getElementById('imageOverlay');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].setAttribute('disabled', 'disabled');
        }
        document.getElementById('floatingInputNama').value = initialName;
        document.getElementById('floatingInputUsername').value = initialUsername;
        document.getElementById('floatingInputEmail').value = initialEmail;
        document.getElementById('floatingInputPhone').value = initialPhone;
        document.getElementById('floatingInputAddress').value = initialAddress;
        userImage.src = initialImage;
        imageOverlay.style.display = 'none';
        editBtn.style.display = 'block';
        saveBtn.style.display = 'none';
        cancelBtn.style.display = 'none';
    }

    function displayImage() {
        var imageInput = document.getElementById('imageInput');
        var userImage = document.getElementById('userImage');


        if (imageInput.files && imageInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                userImage.src = e.target.result;
            };

            reader.readAsDataURL(imageInput.files[0]);
        }
    }
</script>
@endsection