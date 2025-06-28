<?php

namespace App\Livewire;

use App\Models\PerangkatModels;
use App\Models\RuanganModels;
use Livewire\Component;

class HomeComponents extends Component
{
    public $listperangkat = '';
    public $id,$kategori,$label_cctv,$model,$channel,$sumbu_x,$sumbu_y,$keterangan,$ruangan_models_id;
    public function render()
    {
        $this->listperangkat = json_encode(PerangkatModels::with('ruangan')->orderBy('model','desc')->get());
        $data['rooms'] = RuanganModels::orderBy('nama_ruangan','desc')->get();
        return view('livewire.home-components',$data);
    }
  

    public function store(){
        $this->validate([
            'label_cctv' => 'required',
            'kategori' => 'required',
            'model' => 'required',
            'channel' => 'required',
            'sumbu_x' => 'required',
            'sumbu_y' => 'required',
            'keterangan' => 'required',
            'ruangan_models_id' => 'required',
        ],[
            'kategori.required' => 'kategori tidak boleh kosong',
            'model.required' => 'model tidak boleh kosong',
            'label_cctv.required' => 'label CCTV tidak boleh kosong',
            'channel.required' => 'Channel tidak boleh kosong',
            'sumbu_x.required' => 'sumbu x tidak boleh kosong',
            'sumbu_y.required' => 'sumbu y tidak boleh kosong',
            'keterangan.required' => 'keterangan tidak boleh kosong',
            'ruangan_models_id.required' => 'ruangan harus dipilih',
        ]);

        PerangkatModels::create([
            'label_cctv' => $this->label_cctv,
            'kategori' => $this->kategori,
            'model' => $this->model,
            'channel' => $this->channel,
            'sumbu_x' => $this->sumbu_x,
            'sumbu_y' => $this->sumbu_y,
            'keterangan' => $this->keterangan,
            'ruangan_models_id' => $this->ruangan_models_id,
        ]);
        // $this->emit('perangkatBerhasilDisimpan');
        session()->flash('success','Berhasil menambahkan perangkat');
        $this->reset();
        $this->listperangkat = PerangkatModels::with('ruangan')->orderBy('model','desc')->get();
        $this->dispatch('perangkat-disimpan');
    }
    

}
