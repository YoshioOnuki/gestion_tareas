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
    public $anio;
    public $anio2;
    public $titulo;
    public $email_contacto;

    public function mount()
    {
        $this->fecha = '2024-02-25 22:22:50';
        $this->anio = config('settings.anio');
        $this->anio2 = config('settings.anio2');
        $this->titulo = config('settings.titulo');
        $this->email_contacto = config('settings.email_contacto');
    }

    public function saveConfiguracion()
    {
        // Guardar los cambios en las variables de configuración
        config(['settings.anio' => $this->anio]);
        config(['settings.anio2' => $this->anio2]);
        config(['settings.titulo' => $this->titulo]);
        config(['settings.email_contacto' => $this->email_contacto]);

        // Guardar los cambios en el archivo de configuración
        $this->guardarArchivoConfiguracion();

        // Mostrar mensaje de éxito o redireccionar, etc.
        session()->flash('message', 'Configuración guardada exitosamente.');
        $this->dispatch(
            'toast-basico',
            mensaje: 'Datos guardados correctamente',
            type: 'success'
        );
    }

    private function guardarArchivoConfiguracion()
    {
        // Guardar los cambios en el archivo de configuración
        $archivoConfiguracion = '<?php return ' . var_export(config('settings'), true) . ';';
        file_put_contents(config_path('settings.php'), $archivoConfiguracion);
    }

    public function render()
    {
        return view('livewire.home.home-admin');
    }
}
