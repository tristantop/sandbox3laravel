@extends('layout.layout')
@section('content')

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                @foreach ($data_profile as $d)
                <form method="POST" action="/profile/update">
                @csrf
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">{{ $title }}</h4>
                        </div>
                        <hr />
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" value="{{ $d->name }}" class="form-control" name="name" placeholder="Name Lengkap ..." required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" value="{{ $d->email }}" class="form-control" name="email" placeholder="Email ..." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" value="" class="form-control" name="password" placeholder="Password ..." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                </form>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

@endsection
