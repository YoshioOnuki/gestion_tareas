<div>
    Hello world / admin <br>
    Fecha actual: {{ $fecha }} <br>
    {{ formatoFecha($fecha) }} <br>
    {{ formatoFechaLimite($fecha) }} <br>

    <br><br>
    <!-- resources/views/livewire/configuracion.blade.php -->

    <div>
        <input type="text"wire:model="anio">
        <input type="text" wire:model="anio2">
        <input type="text" wire:model="titulo">
        <input type="text" wire:model="email_contacto">
        <button wire:click="saveConfiguracion">Guardar Configuración</button>
    </div>

</div>
