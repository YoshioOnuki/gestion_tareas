<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SidebarApp extends Component
{
    public $usuario;
    public $persona;
    public $nombre;

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function cambiar_tema()
    {
        $this->dispatch('cambiar_tema');
    }

    public function mount()
    {
        $this->usuario = auth()->user();
        $this->persona = $this->usuario->persona;
        $this->nombre = $this->persona->getNombreCortoAttribute();
    }

    public function render()
    {
        

        return view('livewire.components.sidebar-app');
    }
}
