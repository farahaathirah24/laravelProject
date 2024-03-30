@extends('template/templateMain')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
    @endif
        <div class="card">
            <div class="card-header">User Profile</div>

            <div class="card-body">
                <form id="profileForm" action="{{ route('profileProc') }}" method="POST">
                    @csrf
                    <!-- Input fields for profile details -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input id="email" type="email" class="form-control" value="{{ $user->email }}" readonly required>
                    </div>
                    <!-- Add more profile details as needed -->

                    <!-- Buttons -->
                    <div class="text-center">
                        <button  id="editBtn" type="button" class="btn btn-primary editBtn">Edit Profile</button>
                        <button id="updateBtn" type="submit" class="btn btn-success d-none">Update</button>
                        <button id="cancelBtn" type="button" class="btn btn-danger d-none">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/profile.js') }}"></script> 

@endsection

