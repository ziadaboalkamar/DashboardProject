@extends("layouts.dashboard")
@section("title","عرض المستخدمين")

@section("css")@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">جدول المستخدمين</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active">جدول المستخدمين
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bordered table start -->
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">جدول المستخدمين</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الايميل</th>
                            {{-- <th>Status</th> --}}
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @isset($users)
@php
$i = 1;
@endphp
                            @foreach ($users as $user )
                            <tr>
                                <td>{{$i++ }}</td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>{{$user->email}}</td>

                                {{-- <td><span class="badge badge-pill badge-light-primary mr-1">Active</span></td> --}}
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{route("user.edit",$user->id)}}">
                                                <i data-feather="edit-2" class="mr-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" href="{{route("user.delete",$user->id)}}">
                                                <i data-feather="trash" class="mr-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endisset


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bordered table end -->
@endsection
@section("js")
@endsection
