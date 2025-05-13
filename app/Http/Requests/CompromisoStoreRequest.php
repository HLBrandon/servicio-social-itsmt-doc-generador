<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompromisoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nombre_completo"       => ["required", "string", "min:5", "max:255"],
            "telefono"              => ["required", "min:10", "max:10"],
            "domicilio"             => ["required", "string", "min:5", "max:255"],
            "numero_control"        => ["required", "string", "min:8", "max:9"],
            "carrera"               => ["required", "string", Rule::exists("careers", "name")],
            "dependencia"           => ["required", "string", "min:5", "max:255"],
            "domicilio_dependencia" => ["required", "string", "min:5", "max:255"],
            "nombre_responsable"    => ["required", "string", "min:5", "max:255"],
        ];
    }

    public function messages(): array
    {
        return [
            "nombre_completo.required" => "El nombre completo es obligatorio.",
            "nombre_completo.string"   => "El nombre completo debe ser una cadena de texto.",
            "nombre_completo.min"      => "El nombre completo debe tener al menos 5 caracteres.",
            "nombre_completo.max"      => "El nombre completo no puede tener más de 255 caracteres.",

            "telefono.required" => "El teléfono es obligatorio.",
            "telefono.min"      => "El teléfono debe tener exactamente 10 dígitos.",
            "telefono.max"      => "El teléfono debe tener exactamente 10 dígitos.",

            "domicilio.required" => "El domicilio es obligatorio.",
            "domicilio.string"   => "El domicilio debe ser una cadena de texto.",
            "domicilio.min"      => "El domicilio debe tener al menos 5 caracteres.",
            "domicilio.max"      => "El domicilio no puede tener más de 255 caracteres.",

            "numero_control.required" => "El número de control es obligatorio.",
            "numero_control.string"   => "El número de control debe ser una cadena de texto.",
            "numero_control.min"      => "El número de control debe tener al menos 8 caracteres.",
            "numero_control.max"      => "El número de control no puede tener más de 9 caracteres.",

            "carrera.required" => "La carrera es obligatoria.",
            "carrera.string"   => "La carrera debe ser una cadena de texto.",
            "carrera.exists"   => "La carrera seleccionada no es válida.",

            "dependencia.required" => "La dependencia es obligatoria.",
            "dependencia.string"   => "La dependencia debe ser una cadena de texto.",
            "dependencia.min"      => "La dependencia debe tener al menos 5 caracteres.",
            "dependencia.max"      => "La dependencia no puede tener más de 255 caracteres.",

            "domicilio_dependencia.required" => "El domicilio de la dependencia es obligatorio.",
            "domicilio_dependencia.string"   => "El domicilio de la dependencia debe ser una cadena de texto.",
            "domicilio_dependencia.min"      => "El domicilio de la dependencia debe tener al menos 5 caracteres.",
            "domicilio_dependencia.max"      => "El domicilio de la dependencia no puede tener más de 255 caracteres.",

            "nombre_responsable.required" => "El nombre del responsable es obligatorio.",
            "nombre_responsable.string"   => "El nombre del responsable debe ser una cadena de texto.",
            "nombre_responsable.min"      => "El nombre del responsable debe tener al menos 5 caracteres.",
            "nombre_responsable.max"      => "El nombre del responsable no puede tener más de 255 caracteres.",
        ];
    }
}
