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
            @include('perangkat.create')
        @endif

        @if ($listpage)
            @include('perangkat.list')
        @endif
    </div>
</div>
