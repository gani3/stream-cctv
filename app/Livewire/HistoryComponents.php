<?php

namespace App\Livewire;

use App\Models\HistoryModels;
use App\Models\PerangkatModels;
use Livewire\Component;

class HistoryComponents extends Component
{

    public $addpage,$editpage = false;
    public $listpage = true;
    public $id,$keterangan,$jam,$tanggal,$perangkat_models_id;

    public function render()
    {
        $data['histories'] = HistoryModels::with('perangkat')->orderBy('created_at', 'desc')->get();
        $data['devices'] = PerangkatModels::orderBy('model', 'desc')->get();
        return view('livewire.history-components',$data);
    }
    public function create(){
        $this->listpage = false;
        $this->editpage = false;
        $this->addpage = true;
    }

    public function store(){
        $this->validate([
            'keterangan' => 'required',
            'jam' => 'required',
            'tanggal' => 'required',
            'perangkat_models_id' => 'required',
        ],[
            'keterangan.required' => 'keterangan tidak boleh kosong',
            'jam.required' => 'jam tidak boleh kosong',
            'tanggal.required' => 'tanggal tidak boleh kosong',
            'perangkat_models_id.required' => 'perangkat harus dipilih',
        ]);

        HistoryModels::create([
            'keterangan' => $this->keterangan,
            'jam' => $this->jam,
            'tanggal' => $this->tanggal,
            'perangkat_models_id' => $this->perangkat_models_id,
        ]);
        session()->flash('success','Berhasil menambahkan histori');
        $this->reset();
    }

    public function update($id){
        $updateHistory = HistoryModels::find($id);
        $updateHistory->update([
            'keterangan' => $this->keterangan,
            'jam' => $this->jam,
            'tanggal' => $this->tanggal,
            'perangkat_models_id' => $this->perangkat_models_id,
        ]);
        session()->flash('success', 'Berhasil melakukan update data');
        $this->reset();
    }

    public function destroy($id){
        $getHistory =  HistoryModels::find($id);
        $getHistory->delete();
        session()->flash('success', 'Berhasil menghapus data');
        $this->reset();
    }

    public function edit($id){
        $getHistory = HistoryModels::with('perangkat')->find($id);
        $this->id = $getHistory->id;
        $this->keterangan = $getHistory->keterangan;
        $this->jam = $getHistory->jam;
        $this->tanggal = $getHistory->tanggal;
        $this->perangkat_models_id = $getHistory->perangkat_models_id;
        $this->listpage=false;
        $this->addpage=false;
        $this->editpage=true;
        
    }
}
