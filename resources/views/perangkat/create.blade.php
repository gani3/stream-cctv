   <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $addpage ? 'Tambah' : 'Edit' }} Perangkat</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="form-horizontal" action="#" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Label CCTV</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="label_cctv" value="{{ @old('label_cctv') }}" class="form-control" id="floatingHp" placeholder="label cctv">
                                @error('label_cctv')
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
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori Perangkat</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" wire:model="kategori">
                                    <option selected="selected">--pilih kategori--</option>
                                    <option value="CCTV">CCTV</option>
                                    <option value="ACCESS DOOR">ACCESS DOOR</option>
                                </select>
                                @error('kategori')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Model</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="model" value="{{ @old('model') }}" class="form-control" id="floatingHp" placeholder="model">
                                @error('model')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Channel CCTV</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="channel" value="{{ @old('channel') }}" class="form-control" id="floatingHp" placeholder="channel cctv">
                                @error('channel')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sumbu X</label>
                            <div class="col-sm-10">
                                <input type="number" wire:model="sumbu_x" value="{{ @old('sumbu_x') }}" class="form-control" id="floatingHp" placeholder="sumbu x">
                                @error('sumbu_x')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Sumbu Y</label>
                            <div class="col-sm-10">
                                <input type="number" wire:model="sumbu_y" value="{{ @old('sumbu_y') }}" class="form-control" id="floatingHp" placeholder="sumbu y">
                                @error('sumbu_y')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="keterangan" value="{{ @old('keterangan') }}" class="form-control" id="floatingHp" placeholder="Keterangan">
                                @error('keterangan')
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
                        <a href="/perangkat" class="btn btn-default float-right">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>