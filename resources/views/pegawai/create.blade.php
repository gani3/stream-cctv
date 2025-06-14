   <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $addpage ? 'Tambah' : 'Edit' }} Ruangan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="form-horizontal" action="#" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nip</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="nip" value="{{ @old('nip') }}" class="form-control" id="floatingHp" placeholder="nip">
                                @error('nip')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="nama_pegawai" value="{{ @old('nama_pegawai') }}" class="form-control" id="floatingHp" placeholder="nama pegawai">
                                @error('nama_pegawai')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" wire:model="jenis_kelamin">
                                    <option selected="selected">--pilih jenis kelamin--</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Ruangan</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" wire:model="ruangan_models_id" id="floatingRole" style="width: 100%;">
                                    <option selected="selected">--pilih ruangan--</option>
                                    @foreach ( $rooms as $room )
                                        <option value="{{ $room->id }}">{{ $room->nama_ruangan }}</option>
                                    @endforeach
                                </select>   
                                @error('ruangan_models_id')
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
                        <a href="/pegawai" class="btn btn-default float-right">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>