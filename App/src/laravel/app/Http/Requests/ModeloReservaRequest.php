<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeloReservaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // permitir siempre, cambia si usas autenticación
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // Detectar si es PATCH/PUT (update)
        $isUpdate = in_array($this->method(), ['PATCH', 'PUT']);

        return [
            'nombre_cliente' => ($isUpdate ? 'sometimes' : 'required') . '|string|max:255',
            'personas'       => ($isUpdate ? 'sometimes' : 'required') . '|integer|min:1',
            'fecha_reserva'  => ($isUpdate ? 'sometimes' : 'required') . '|date|after_or_equal:today',
            'hora_reserva'   => ($isUpdate ? 'sometimes' : 'required') . '|date_format:H:i',
            'estado'         => ($isUpdate ? 'sometimes' : 'nullable') . '|string|in:pendiente,confirmada,cancelada',
        ];
    }

    /**
     * Custom messages for validation errors
     */
    public function messages(): array
    {
        return [
            'nombre_cliente.required' => 'El nombre del cliente es obligatorio',
            'nombre_cliente.max'      => 'El nombre del cliente no puede exceder 255 caracteres',
            'personas.required'       => 'La cantidad de personas es obligatoria',
            'personas.integer'        => 'La cantidad de personas debe ser un número',
            'personas.min'            => 'Debe reservar al menos 1 persona',
            'fecha_reserva.required'  => 'La fecha de la reserva es obligatoria',
            'fecha_reserva.date'      => 'La fecha debe ser válida',
            'fecha_reserva.after_or_equal' => 'La fecha debe ser hoy o posterior',
            'hora_reserva.required'   => 'La hora de la reserva es obligatoria',
            'hora_reserva.date_format' => 'La hora debe tener el formato HH:MM',
            'estado.in'               => 'El estado debe ser pendiente, confirmada o cancelada',
        ];
    }
}
