<?php

namespace App\Livewire;

use App\Models\PerangkatModels;
use App\Models\RuanganModels;
use Livewire\Component;

class PerangkatComponents extends Component
{
    public $addpage,$editpage = false;
    public $listpage = true;
    public $id,$kategori,$label_cctv,$model,$channel,$sumbu_x,$sumbu_y,$keterangan,$ruangan_models_id;

    public function render()
    {
        $data['devices'] = PerangkatModels::with('ruangan')->orderBy('channel','asc')->get();
        $data['rooms'] = RuanganModels::orderBy('nama_ruangan','desc')->get();
        return view('livewire.perangkat-components',$data);
    }

    public function create(){
        $this->listpage = false;
        $this->editpage = false;
        $this->addpage = true;
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
            'label_cctv.required' => 'label cctv tidak boleh kosong',
            'kategori.required' => 'kategori tidak boleh kosong',
            'model.required' => 'model tidak boleh kosong',
            'channel.required' => 'ip address tidak boleh kosong',
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
        session()->flash('success','Berhasil menambahkan perangkat');
        $this->reset();
    }

    public function update($id){
        $updatePerangkat = PerangkatModels::find($id);
        $updatePerangkat->update([
            'label_cctv' => $this->label_cctv,
            'kategori' => $this->kategori,
            'model' => $this->model,
            'channel' => $this->channel,
            'sumbu_x' => $this->sumbu_x,
            'sumbu_y' => $this->sumbu_y,
            'keterangan' => $this->keterangan,
            'ruangan_models_id' => $this->ruangan_models_id,
        ]);
        session()->flash('success', 'Berhasil melakukan update data');
        $this->reset();
    }

    public function destroy($id){
        $getPerangkat =  PerangkatModels::find($id);
        $getPerangkat->delete();
        session()->flash('success', 'Berhasil menghapus data');
        $this->reset();
    }

    public function edit($id){
        $getPerangkat = PerangkatModels::find($id);
        $this->id = $getPerangkat->id;
        $this->label_cctv = $getPerangkat->label_cctv;
        $this->kategori = $getPerangkat->kategori;
        $this->model = $getPerangkat->model;
        $this->channel = $getPerangkat->channel;
        $this->sumbu_x = $getPerangkat->sumbu_x;
        $this->sumbu_y = $getPerangkat->sumbu_y;
        $this->keterangan = $getPerangkat->keterangan;
        $this->ruangan_models_id = $getPerangkat->ruangan_models_id;
        $this->listpage=false;
        $this->addpage=false;
        $this->editpage=true;
        
    }
}
