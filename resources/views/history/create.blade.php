   <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $addpage ? 'Tambah' : 'Edit' }} History</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="form-horizontal" action="#" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-5">
                                <input type="date" wire:model="tanggal" value="{{ @old('tanggal') }}" class="form-control" id="floatingHp" placeholder="tanggal">
                                @error('tanggal')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <input type="time" wire:model="jam" value="{{ @old('jam') }}" class="form-control" id="floatingHp" placeholder="jam">
                                @error('jam')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Perangkat</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" wire:model="perangkat_models_id" id="floatingRole" style="width: 100%;">
                                    <option selected="selected">--pilih perangkat--</option>
                                    @foreach ( $devices as $device )
                                        <option value="{{ $device->id }}">{{ $device->label_cctv }} ( {{ $device->ruangan->nama_ruangan }} )</option>
                                    @endforeach
                                </select>   
                                @error('perangkat_models_id')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="keterangan" value="{{ @old('keterangan') }}" class="form-control" id="floatingHp" placeholder="keterangan">
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
                        <a href="/history" class="btn btn-default float-right">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>