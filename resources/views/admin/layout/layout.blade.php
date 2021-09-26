@include('admin.layout.header')

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">

        @include('admin.layout.topbar')
        <div class="container-fluid">

            @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif

            @if(Session::has('error-message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('error-message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif

            @yield('content')
        </div>
        
    </div>
</div>
@include('admin.layout.footer')