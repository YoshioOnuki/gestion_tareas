<?php

namespace App\Livewire\Auth;

use App\Models\Usuario;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.auth')]
#[Title('Login - Sistema de Gestión de Tareas')]
class Login extends Component
{
    #[Validate('required')]
    public $correo;
    #[Validate('required')]
    public $contrasenia;
    public $recordarme = false;

    public function login()
    {
        $this->validate();

        $usuario = Usuario::where('usuario_correo', $this->correo)->first();

        if ($usuario) {
            if ($usuario->comprobarCredenciales($this->contrasenia)) {
                auth()->login($usuario, $this->recordarme);
                return redirect()->intended(route('home'));
            }else{
                $this->dispatch(
                    'toast-basico',
                    mensaje: 'Las credenciales son incorrectas',
                    type: 'error'
                );
            }
        }else{
            $this->addError('correo', 'Las credenciales no coinciden con nuestros registros.');
            $this->dispatch(
                'toast-basico',
                mensaje: 'Las credenciales son incorrectas',
                type: 'error'
            );
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
