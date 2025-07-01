   <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $addpage ? 'Tambah' : 'Edit' }} Buku Tamu</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="nama_lengkap" value="{{ @old('nama_lengkap') }}" class="form-control" id="floatingHp" placeholder="nama lengkap">
                                @error('nama_lengkap')
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
                                @error('kategori')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="row col-sm-10">
                                <div class="col-sm-4">
                                    <input type="date" wire:model="tanggal" value="{{ @old('tanggal') }}" class="form-control" id="floatingHp" placeholder="Tanggal">
                                    @error('tanggal')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row col-sm-4">
                                    <label for="" class="col-form-label">Masuk</label>
                                    <div class="col-md-10">
                                        <input type="time" wire:model="jam_masuk" value="{{ @old('jam_masuk') }}" class="form-control" id="floatingHp" placeholder="jam masuk">
                                        @error('jam_masuk')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row col-sm-4">
                                    <label for="" class="col-form-label">Pulang</label>
                                    <div class="col-md-9">
                                        <input type="time" wire:model="jam_pulang" value="{{ @old('jam_pulang') }}" class="form-control" id="floatingHp" placeholder="jam pulang">
                                        @error('jam_pulang')
                                            <span class="form-text text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keperluan</label>
                            <div class="col-sm-10">
                                <textarea type="text" wire:model="keperluan" value="{{ @old('keperluan') }}" class="form-control" id="floatingHp" placeholder="keperluan"></textarea>
                                @error('keperluan')
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
                        <a href="/buku-tamu" class="btn btn-default float-right">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>