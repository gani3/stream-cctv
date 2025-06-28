
<script src="{{asset('template')}}/dist/js/hls_latest.js"></script>
<style>
   .bg-peta {
      /* background-image: url('/image/newTMIIMAP.jpg'); */
      background-size: auto;
      background-repeat: no-repeat;
      background-position: center;
      height: 100vh;
      background-image: url('{{asset("image/pln_bangka.svg")}}');
      /* background-size: contain; */
   }
  .marker {
    position: absolute;
    width: 50px;
    height: 50px;
    transform: translate(-50%, -100%); /* Pusatkan titik bawah gambar ke X/Y */
    cursor: pointer;
  }
  .marker-label {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 12px;
    background: rgba(255,255,255,0.8);
    padding: 2px 4px;
    border-radius: 3px;
    white-space: nowrap;
  }
</style>
    <div class="">
        <div class="">

        <!-- button atas -->
         

           <div class="button-container">
             @if (auth()->user()->role == 'Admin')
              <button class="button" onclick="LocationDevice()" id="add-perangkat">
                  <img src="{{asset('image/add-cctv.png')}}" alt="users" width="25" srcset="">
              </button>
              <button class="button d-none" onclick="LocationRemove()" id="close-perangkat">
                  <img src="{{asset('image/close.png')}}" alt="users" width="25" srcset="">
              </button>
            @endif
            <button class="button" onclick="window.location.href='/keluar'">
              <img src="{{asset('image/sign-out.png')}}" alt="users" width="25" srcset="">
            </button>
          </div>
          <div id="device-data" data-list='{{ $listperangkat }}'></div>
          <div id="device-data" data-list='{{ $listperangkat }}'></div>
          <div style="background-color: #89B357 !important;">
            <div class="bg-peta" id="myDiv">
              
            </div>
          </div>
             @if (auth()->user()->role == 'Admin')
              <!-- button bawah -->
              <div class="wrapper-map" id="wrapper_menu">
                <input type="checkbox" id="toogle" class="hidden-trigger">
                <label for="toogle" class="circle">
                <svg class="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48" height="48" xml:space="preserve" version="1.1" viewBox="0 0 48 48">
                  <image width="48" height="48" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAQAAAD9CzEMAAAAbElEQVR4Ae3XwQnFQAiE4eVVsGAP1mkPFjwvQvYSWCQYCYGZv4Dv5MGB5ghcIiDQI+kCftCzNsAR8y5gYu2rwCBAgMBTgEC3rek2yQEtAZoDjso8AyaKexmIDJUZD40AAQIE0gwx449GgMC9/t0b7GTsa7J+AAAAAElFTkSuQmCC"></image>
                </svg>
                </label>
                
                <div class="subs">
                  <button class="sub-circle" onclick="window.location.href='/users'" title="manage users">
                    <input value="1" name="sub-circle" type="radio" id="sub1" class="hidden-sub-trigger">
                    <label for="sub1">
                      <img src="{{asset('image/users.png')}}" alt="users" width="40" srcset="">
                    </label>
                  </button>
                  <button class="sub-circle" onclick="window.location.href='/history'" title="manage history">
                    <input value="1" name="sub-circle" type="radio" id="sub2" class="hidden-sub-trigger">
                    <label for="sub2">
                      <img src="{{asset('image/history.png')}}" alt="users" width="40" srcset="">
                    </label>
                  </button>
                  <button class="sub-circle" onclick="window.location.href='/pegawai'" title="manage pegawai">
                    <input value="1" name="sub-circle" type="radio" id="sub3" class="hidden-sub-trigger">
                    <label for="sub3">
                      <img src="{{asset('image/employee.png')}}" alt="users" width="40" srcset="">
                    </label>
                  </button>
                  <button class="sub-circle" onclick="window.location.href='/ruangan'" title="manage ruangan">
                    <input value="1" name="sub-circle" type="radio" id="sub4" class="hidden-sub-trigger">
                    <label for="sub4">
                      <img src="{{asset('image/room.png')}}" alt="users" width="40" srcset="">
                    </label>
                  </button>
                  <button class="sub-circle" onclick="window.location.href='/perangkat'" title="manage perangkat">
                    <input value="1" name="sub-circle" type="radio" id="sub5" class="hidden-sub-trigger">
                    <label for="sub5">
                      <img src="{{asset('image/cctv.png')}}" alt="users" width="40" srcset="">
                    </label>
                  </button>
                </div>
              </div>
            @endif


            <!-- modal box -->
            <div class="modal fade" wire:ignore.self id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Lokasi Perangkat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
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
                                        <option value="">--pilih ruangan--</option>
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
                                        <option value="">--pilih kategori--</option>
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
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ip Address</label>
                                <div class="col-sm-10">
                                    <input type="text" wire:model="channel" value="{{ @old('channel') }}" class="form-control" id="floatingHp" placeholder="Channel Cctv">
                                    @error('channel')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Sumbu X</label>
                                <div class="col-sm-10">
                                    <input type="number" id="sumbu_x" wire:model="sumbu_x" value="{{ @old('sumbu_x') }}" class="form-control" id="floatingHp" placeholder="sumbu x">
                                    @error('sumbu_x')
                                        <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Sumbu Y</label>
                                <div class="col-sm-10">
                                    <input type="number" id="sumbu_y" wire:model="sumbu_y" value="{{ @old('sumbu_y') }}" class="form-control" id="floatingHp" placeholder="sumbu y">
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
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button wire:click="store" type="button" class="btn btn-sm btn-outline-success btn-sm">Simpan Data</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- modal box stream cctv -->
            <div class="modal fade" wire:ignore.self id="stream-cctv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="label-stream" style="text-transform: capitalize;"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <video id="video" controls autoplay style="width: 100% !important;"></video>
                    <div id="video-notfound" style="display: none; text-align: center; padding: 20px;">
                      <h4 style="color: red;">Stream tidak ditemukan / gagal dimuat</h4>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" id="akhiriStream" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script>
      
    function LocationDevice () {
      const konfirmasi = confirm('Silahkan klik pada lokasi manapun didalam peta untuk menginput lokasi perangkat, klik ok untuk melanjutkan')
      if (konfirmasi) {
        const div = document.getElementById('myDiv');

        clickHandler = function(e) {
          const x = e.clientX;
          const y = e.clientY;
          const sumbuXInput = document.getElementById('sumbu_x');
          const sumbuYInput = document.getElementById('sumbu_y');
          sumbuXInput.value = x;
          sumbuYInput.value = y
          
          // Trigger native input event agar Livewire mendeteksi perubahan
          sumbuXInput.dispatchEvent(new Event('input'));
          sumbuYInput.dispatchEvent(new Event('input'));
          $('#exampleModal').modal('show');
        };

        div.addEventListener('click', clickHandler);
        const button = document.getElementById('wrapper_menu');
        const add = document.getElementById('add-perangkat');
        const close = document.getElementById('close-perangkat');

        close.classList.remove('d-none')
        button.classList.add('d-none')
        add.classList.add('d-none')
      }
    }
    
    document.addEventListener("DOMContentLoaded", function () {
        const element = document.getElementById('device-data');
        const jsonString = element.dataset.list;
        try {
            const listPerangkat = JSON.parse(jsonString);
            listPerangkat.forEach(device => {
              tambahMarker(device.sumbu_x, device.sumbu_y, device.model, device);
            });
            
        } catch (e) {
            console.error("Gagal parse JSON:", e);
        }
    });

    window.addEventListener('perangkat-disimpan', function () {
      setTimeout(() => {
        location.reload()
      }, 1000);
    });

    function tambahMarker(x, y, label = '', data = {}) {
      const container = document.getElementById('myDiv');
      
      const wrapper = document.createElement('div');
      wrapper.style.position = 'absolute';
      wrapper.style.left = `${x}px`;
      wrapper.style.top = `${y}px`;
      wrapper.style.transform = 'translate(-50%, -100%)';
      wrapper.style.zIndex = 10;
      wrapper.style.cursor = 'pointer';

      const markerImg = document.createElement('img');
      markerImg.src = '/image/cctv.png';
      markerImg.className = 'marker';

      // Event click pada marker
      wrapper.addEventListener('click', function () {
        // Isi input berdasarkan data marker
        const inputMappings = {
          'model': data.model,
          'channel': data.channel,
          'kategori': data.kategori,
          'sumbu_x': data.sumbu_x,
          'sumbu_y': data.sumbu_y,
          'keterangan': data.keterangan,
          'ruangan_models_id': data.ruangan_models_id
        };

        // for (const [field, value] of Object.entries(inputMappings)) {
        //   const input = document.querySelector(`[wire\\:model="${field}"]`);
        //   if (input) {
        //     input.value = value;
        //     input.dispatchEvent(new Event('input'));
        //   }
        // }


        // Tampilkan modal serta mulai proses stream
        $('#label-stream').html(`${data.label_cctv}`);
        $('#stream-cctv').modal('show');
        mulaiStreaming(data.channel)
      });

      // Label jika ada
      if (label) {
        const labelEl = document.createElement('div');
        labelEl.className = 'marker-label';
        labelEl.innerText = `${data.label_cctv}`;
        wrapper.appendChild(labelEl);
      }

      wrapper.appendChild(markerImg);
      container.appendChild(wrapper);
    }


    function LocationRemove () {
      const div = document.getElementById('myDiv');
      div.removeEventListener('click', clickHandler);
      const button = document.getElementById('wrapper_menu');
      const add = document.getElementById('add-perangkat');
      const close = document.getElementById('close-perangkat');
      close.classList.add('d-none')
      button.classList.remove('d-none')
      add.classList.remove('d-none')
    }


    // untuk stream hls file sesuai dengan channel yang dipilih
    function mulaiStreaming(channel) {
      if (channel) {
        fetch("{{ route('stream.start') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
          },
          body: JSON.stringify({
            channel: channel
          })
        })
        .then(response => response.json())
        .then(data => {
          console.log('Berhasil:', data);
          const notfound = document.getElementById('video-notfound');
          const video = document.getElementById('video');
          const hls = new Hls();
          hls.loadSource(`/hls/stream${channel}/index.m3u8`); 
          hls.attachMedia(video);
          $('#akhiriStream').attr('onclick', `hentikanStreaming(${channel})`);
          video.style.display = 'block';
          notfound.style.display = 'none';
        })
        .catch(error => {
          $('#akhiriStream').attr('onclick', `hentikanStreaming(${channel})`);
          const video = document.getElementById('video');
          const notfound = document.getElementById('video-notfound');
          video.style.display = 'none';
          notfound.style.display = 'block';
        });
      }else{
        alert(`Perangkat yang di pilih tidak memiliki Channel ID`)
      }
    }

    function hentikanStreaming(channel) {
      console.log(channel);
      if (channel) {
        fetch("{{ route('stream.stop') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
          },
          body: JSON.stringify({
            channel: channel
          })
        })
        .then(response => response.json())
        .then(data => {
          console.log(data);
          alert(`Streaming channel ${channel} dihentikan`);
        })
        .catch(error => {
          console.error('Gagal menghentikan:', error);
          alert('Gagal menghentikan streaming');
        });
      }
    }
  </script>