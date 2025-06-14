<div class="card">
  <div class="card-header">
    <h3 class="card-title">Manage Perangkat</h3>
    <button wire:click="create" class="btn btn-sm btn-outline-success float-right card-title" style="font-size: 14px;"> <i class="fas fa-plus"> </i> &nbsp; Tambah Data</button>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th>Kategori</th>
          <th>Model</th>
          <th>IP Address</th>
          <th>Koordinat</th>
          <th>Keterangan</th>
          <th>Ruangan</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($devices as $device )
          <tr>
            <td scope="row" class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $device->kategori }}</td>
            <td>{{ $device->model }}</td>
            <td>{{ $device->ip_address }}</td>
            <td>sumbu X : <b>{{ $device->sumbu_x }}</b> , sumbu Y : <b>{{ $device->sumbu_y }}</b></td>
            <td>{{ $device->keterangan}}</td>
            <td>{{ $device->ruangan->nama_ruangan}}</td>
            <td class="text-center">
                <button wire:click="edit({{ $device->id }})" class="btn btn-sm bg-info border-0"><li class="fa fa-edit text-white"></li></button>
                <button wire:click="destroy({{ $device->id }})"  wire:confirm="Perangkat dengan model ' {{ $device->model }} ' akan dihapus, apakah anda yakin ?" class="btn btn-sm bg-danger border-0 px-2 py-1"><li class="fa fa-trash"></li></button>
            </td>
          </tr>
        @empty
        @endforelse
      </tbody>
    </table>
  </div>
</div>