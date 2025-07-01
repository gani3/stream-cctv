<div class="card">
  <div class="card-header">
    <h3 class="card-title">Manage Buku Tamu</h3>
    <button wire:click="create" class="btn btn-sm btn-outline-success float-right card-title" style="font-size: 14px;"> <i class="fas fa-plus"> </i> &nbsp; Tambah Data</button>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th>Nama Ruangan</th>
          <th>Jenis Kelamin</th>
          <th>Tanggal</th>
          <th>Masuk</th>
          <th>Pulang</th>
          <th>Keperluan</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($guestbooks as $guest )
          <tr>
            <td scope="row" class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $guest->nama_lengkap }}</td>
            <td>{{ $guest->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>{{ $guest->tanggal }}</td>
            <td>{{ $guest->jam_masuk }}</td>
            <td>{{ $guest->jam_pulang }}</td>
            <td>{{ $guest->keperluan }}</td>
            <td class="text-center">
                <button wire:click="edit({{ $guest->id }})" class="btn btn-sm bg-info border-0"><li class="fa fa-edit text-white"></li></button>
                <button wire:click="destroy({{ $guest->id }})"  wire:confirm="Data tamu ' {{ $guest->nama_lengkap }} ' akan dihapus, apakah anda yakin ?" class="btn btn-sm bg-danger border-0 px-2 py-1"><li class="fa fa-trash"></li></button>
            </td>
          </tr>
        @empty
        @endforelse
      </tbody>
    </table>
  </div>
</div>