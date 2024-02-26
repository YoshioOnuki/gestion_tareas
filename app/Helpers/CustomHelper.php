<?php

function formatoFecha($fecha)
{
    return date('d/m/Y', strtotime($fecha));
}

function formatoFechaHora($fecha)
{
    return date('d/m/Y H:i:s', strtotime($fecha));
}

function formatoFechaHoraSinSegundos($fecha)
{
    return date('d/m/Y H:i', strtotime($fecha));
}

//Formato de "Queda x meses/días/horas/minutos/segundos para la fecha límite"
function formatoFechaLimite($fecha)
{
    $fecha_actual = new DateTime();
    $fecha_limite = new DateTime($fecha);

    // Calcula la diferencia entre la fecha actual y la fecha límite
    $diferencia = $fecha_actual->diff($fecha_limite);

   // Verifica si la fecha límite ha expirado
    if ($diferencia->invert) {
        return 'La fecha límite ha expirado';
    }

    // Obtiene los componentes de la diferencia
    $meses = $diferencia->m;
    $dias = $diferencia->d;
    $horas = $diferencia->h;
    $minutos = $diferencia->i;
    $segundos = $diferencia->s;

    // Define el texto base
    $texto = '';

    // Verifica si quedan meses
    if ($meses > 0) {
        $texto .= $meses . ' meses ' . ($dias > 0 ? $dias . (($dias == 1) ? ' día ' : ' días') : '');
    }
    // Si no quedan meses, verifica si quedan días
    elseif ($dias > 0) {
        $texto .= $dias . (($dias == 1) ?  ' día ' : ' días ') . ($horas > 0 ? $horas . (($horas == 1) ? ' hora' : ' horas' ): '');
    }
    // Si no quedan días, verifica si quedan horas
    elseif ($horas > 0) {
        $texto .= $horas . (($horas == 1) ? ' hora ' : ' horas ' ) . ($minutos > 0 ? $minutos . (($horas == 1) ? ' minuto' : ' minutos' ) : '');
    }
    // Si no quedan horas, verifica si quedan minutos
    elseif ($minutos > 0) {
        $texto .= $minutos . (($horas == 1) ? ' minuto' : ' minutos' ) . ($segundos > 0 ? $segundos . (($minutos == 1) ? ' segundo' : ' segundos' ) : '');
    }
    // Si no quedan minutos, muestra solo los segundos
    elseif ($segundos > 0) {
        $texto .= $segundos . (($segundos == 1) ? ' segundo' : ' segundos' );
    }
    // Si no quedan ni meses, días, horas, minutos ni segundos, la fecha límite ha expirado
    else {
        $texto = 'La fecha límite ha expirado';
    }

    // Agrega el prefijo 'Queda' si hay texto disponible
    if ($texto !== '') {
        $texto = 'Queda ' . $texto . ' para la fecha límite';
    }

    return $texto;
}
