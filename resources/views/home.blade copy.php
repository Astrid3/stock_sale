@extends('layouts.app')

 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
 

                <div class="card-body">

                    @if(auth()->user()->role_id == 0)

                    <a href="{{url('admin/routes')}}">Admin</a>
                    <a href="{{url('admin/users')}}">Users</a>

                    @else

                    <div class=”panel-heading”>Normal User</div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
