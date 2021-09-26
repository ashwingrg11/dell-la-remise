<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="180x180" href="{{cloudfrontUrl('images/favicon-180x180.png') }} ">
    <link rel="icon" type="image/png" sizes="32x32" href="{{cloudfrontUrl('images/favicon-32x32.png')  }} ">
    <link rel="icon" type="image/png" sizes="16x16" href="{{cloudfrontUrl('images/favicon-16x16.png') }} ">
    <title>La Remise en plus</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link href="{{cloudfrontUrl('css/app.css') }} " rel="stylesheet">

</head>

<body>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <img src="{{cloudfrontUrl('images/delltech-logo-white.svg')}}" alt="DELL Technologies">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <li class="nav-item {{(strpos(Request::path(),'offer-claim') !== false)  ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('offer-claims.index') }}">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Offer Claims</span>
                </a>
            </li>

            @if(Auth::user()->role == 'super-admin')
                <li class="nav-item {{Request::path() == 'users' ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>List of Users</span></a>
                </li>
                <li class="nav-item {{((Request::path() == 'users/create') || (strpos(Request::path(),'users/edit') !== false)) ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('users.create') }}">
                        <i class="fas fa-fw fa-user-plus"></i>
                        <span>Create User</span></a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>{{ __('Logout') }}</span>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>