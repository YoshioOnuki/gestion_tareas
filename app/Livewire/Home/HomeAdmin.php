<?php

namespace App\Livewire\Home;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Layout('layouts.app')]
#[Title('Home - Sistema de Gestión de Tareas')]
class HomeAdmin extends Component
{
    public $fecha;

    public function mount()
    {
        $this->fecha = '2024-02-25 22:22:50';
    }

    public function render()
    {
        return view('livewire.home.home-admin');
    }
}
