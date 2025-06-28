<div class="">
    <div class="">
        @if (session()->has('success'))
            @session('success')
                <div class="alert alert-success" role="alert" style="position: absolute;">
                    {{ session('success') }}
                </div>
            @endsession
        @endif

        @include('home.map')
    </div>
</div>
