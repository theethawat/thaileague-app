@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header kanit">ระบบจัดการเบื้องหลัง Thaileague Unofficial Application</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<hr>
                    <a href="{{url('admin/allteam')}} "><button class="btn btn-success kanit">หน้าทีมไทยลีก</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
