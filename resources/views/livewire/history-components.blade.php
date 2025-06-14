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
            @include('history.create')
        @endif

        @if ($listpage)
            @include('history.list')
        @endif
    </div>
</div>
