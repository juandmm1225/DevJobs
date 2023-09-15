<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class ListarVacante extends Component
{

    public $vacante;

    public function render()
    {
        $categoria = Categoria::find($this->vacante->categoria);
        $salario = Salario::find($this->vacante->salario);
 
        // dd($categoria);
        $this->vacante['categoria'] = $categoria->categoria;
        $this->vacante['salario'] = $salario->salario;
        return view('livewire.listar-vacante');
    }
}
