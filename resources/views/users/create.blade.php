   <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $addpage ? 'Tambah' : 'Edit' }} Users</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="form-horizontal" action="#" method="POST">
                    @csrf
                    <div class="card-body">
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" wire:model="pegawai_models_id" id="floatingRole" style="width: 100%;">
                                    <option>--pilih pegawai--</option>
                                    @foreach ( $employes as $employe )
                                        <option value="{{ $employe->id }}">{{ $employe->nama_pegawai }}</option>
                                    @endforeach
                                </select>   
                                @error('pegawai_models_id')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="username" value="{{ @old('username') }}" class="form-control" id="floatingHp" placeholder="username">
                                @error('username')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="email" value="{{ @old('email') }}" class="form-control" id="floatingHp" placeholder="email">
                                @error('email')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" wire:model="password" value="{{ @old('password') }}" class="form-control" id="floatingHp" placeholder="password">
                                @error('password')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                @enderror

                                @if ($editpage)
                                    <span class="form-text text-default" style="font-size: 14px;">silahkan di isi untuk update password</span>
                                @endif


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Hak Akses</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" wire:model="role">
                                    <option selected="selected">--pilih hak akses--</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                                @error('role')
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
                        <a href="/users" class="btn btn-default float-right">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>