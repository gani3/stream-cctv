   <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $addpage ? 'Tambah' : 'Edit' }} Ruangan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Ruangan</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="nama_ruangan" value="{{ @old('nama_ruangan') }}" class="form-control" id="floatingHp" placeholder="nama ruangan">
                                @error('nama_ruangan')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if ($addpage)
                            <button wire:click="store" type="button" class="btn btn-outline-success btn-sm">Simpan Data</button>
                        @else
                            <button wire:click="update({{ $id }})" type="button" class="btn btn-outline-success btn-sm">Update Data</button>
                        @endif
                        <a href="/ruangan" class="btn btn-default float-right">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>