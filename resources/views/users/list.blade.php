<div class="card">
  <div class="card-header">
    <h3 class="card-title">Manage Users</h3>
    <button wire:click="create" class="btn btn-sm btn-outline-success float-right card-title" style="font-size: 14px;"> <i class="fas fa-plus"> </i> &nbsp; Tambah Data</button>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th>Nip</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Role</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user )
          <tr>
            <td scope="row" class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $user->pegawai->nip }}</td>
            <td>{{ $user->pegawai->nama_pegawai }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->role }}</td>
            <td class="text-center">
                <button wire:click="edit({{ $user->id }})" class="btn btn-sm bg-info border-0"><li class="fa fa-edit text-white"></li></button>
                <button wire:click="destroy({{ $user->id }})"  wire:confirm="User ' {{ $user->nama_pegawai }} ' akan dihapus, apakah anda yakin ?" class="btn btn-sm bg-danger border-0 px-2 py-1"><li class="fa fa-trash"></li></button>
            </td>
          </tr>
        @empty
        @endforelse
      </tbody>
    </table>
  </div>
</div>