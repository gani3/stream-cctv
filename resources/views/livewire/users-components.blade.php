<div class="content">
    <div class="container">
        <br><br>
        @if (session()->has('success'))
            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endsession
        @endif
        
        @if ($addpage || $editpage)
            @include('users.create')
        @endif

        @if ($listpage)
            @include('users.list')
        @endif
    </div>
</div>
