<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    public $cv;
    public $vacante;

    use WithFileUploads;


    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante){

        $this->vacante = $vacante;
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }

    public function postularme(){

       
       $datos = $this->validate();

       $cv = $this->cv->store('public/cv');
       $datos['cv'] = str_replace('public/cv/','',$cv);

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->titulo,auth()->user()->id));

        session()->flash('mensaje', 'Te has postulado con exito');
        return redirect()->back();
    }
}
