<div class="card">
  <div class="card-header">
    <h3 class="card-title">Manage History</h3>
    <button wire:click="create" class="btn btn-sm btn-outline-success float-right card-title" style="font-size: 14px;"> <i class="fas fa-plus"> </i> &nbsp; Tambah Data</button>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th>Tanggal history</th>
          <th>Created at</th>
          <th>Detail Perangkat</th>
          <th>Keterangan</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($histories as $histori )
          <tr>
            <td scope="row" class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $histori->tanggal }} {{ $histori->jam }}</td>
            <td>{{ $histori->created_at }}</td>
            <td>{{ $histori->perangkat->model }} ( {{ $histori->perangkat->kategori }} )</td>
            <td>{{ $histori->keterangan }}</td>
            <td class="text-center">
                <button wire:click="edit({{ $histori->id }})" class="btn btn-sm bg-info border-0"><li class="fa fa-edit text-white"></li></button>
                <button wire:click="destroy({{ $histori->id }})"  wire:confirm="History perangkat ' {{ $histori->nama_ruangan }} ' tanggal '{{$histori->tanggal}} {{$histori->jam}}' akan dihapus, apakah anda yakin ?" class="btn btn-sm bg-danger border-0 px-2 py-1"><li class="fa fa-trash"></li></button>
            </td>
          </tr>
        @empty
        @endforelse
      </tbody>
    </table>
  </div>
</div>