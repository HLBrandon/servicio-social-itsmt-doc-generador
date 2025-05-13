<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SolicitudStoreRequest extends FormRequest
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
            "nombre_completo"      => ["required", "string", "min:5", "max:255"],
            "sexo"                 => ["required", "in:H,M"],
            "telefono"             => ["required", "min:10", "max:10"],
            "correo_institucional" => ["required", "email", "min:10", "max:255"],
            "domicilio"            => ["required", "string", "min:5", "max:255"],
            "numero_control"       => ["required", "string", "min:8", "max:9"],
            "carrera"              => ["required", "string", Rule::exists("careers", "name")],
            "dependencia"          => ["required", "string", "min:5", "max:255"],
            "titular"              => ["required", "string", "min:5", "max:255"],
            "puesto"               => ["required", "string", "min:5", "max:255"],
            "nombre_programa"      => ["required", "string", "min:5", "max:255"],
            "modalidad"            => ["required", "in:1,2"],
            "tipo_programa"        => ["required", Rule::exists("programs", "id")],
            "otro_programa"        => ["string", "min:5", "max:500"],
            "actividades"          => ["required", "string", "min:5", "max:500"],
        ];
    }

    public function messages(): array
    {
        return [
            "nombre_completo.required" => "El nombre completo es obligatorio.",
            "nombre_completo.string" => "El nombre completo debe ser una cadena de texto.",
            "nombre_completo.min" => "El nombre completo debe tener al menos 5 caracteres.",
            "nombre_completo.max" => "El nombre completo no debe exceder los 255 caracteres.",

            "sexo.required" => "El sexo es obligatorio.",
            "sexo.in" => "El sexo debe ser Hombre o Mujer.",

            "telefono.required" => "El teléfono es obligatorio.",
            "telefono.min" => "El teléfono debe tener exactamente 10 caracteres.",
            "telefono.max" => "El teléfono debe tener exactamente 10 caracteres.",

            "correo_institucional.required" => "El correo institucional es obligatorio.",
            "correo_institucional.email" => "El correo institucional debe ser una dirección de correo válida.",
            "correo_institucional.min" => "El correo institucional debe tener al menos 10 caracteres.",
            "correo_institucional.max" => "El correo institucional no debe exceder los 255 caracteres.",

            "domicilio.required" => "El domicilio es obligatorio.",
            "domicilio.string" => "El domicilio debe ser una cadena de texto.",
            "domicilio.min" => "El domicilio debe tener al menos 5 caracteres.",
            "domicilio.max" => "El domicilio no debe exceder los 255 caracteres.",

            "numero_control.required" => "El número de control es obligatorio.",
            "numero_control.string" => "El número de control debe ser una cadena de texto.",
            "numero_control.min" => "El número de control debe tener al menos 8 caracteres.",
            "numero_control.max" => "El número de control no debe exceder los 9 caracteres.",

            "carrera.required" => "La carrera es obligatoria.",
            "carrera.string" => "La carrera debe ser una cadena de texto.",
            "carrera.exists" => "La carrera seleccionada no es válida.",

            "dependencia.required" => "La dependencia es obligatoria.",
            "dependencia.string" => "La dependencia debe ser una cadena de texto.",
            "dependencia.min" => "La dependencia debe tener al menos 5 caracteres.",
            "dependencia.max" => "La dependencia no debe exceder los 255 caracteres.",

            "titular.required" => "El titular es obligatorio.",
            "titular.string" => "El titular debe ser una cadena de texto.",
            "titular.min" => "El titular debe tener al menos 5 caracteres.",
            "titular.max" => "El titular no debe exceder los 255 caracteres.",

            "puesto.required" => "El puesto es obligatorio.",
            "puesto.string" => "El puesto debe ser una cadena de texto.",
            "puesto.min" => "El puesto debe tener al menos 5 caracteres.",
            "puesto.max" => "El puesto no debe exceder los 255 caracteres.",

            "nombre_programa.required" => "El nombre del programa es obligatorio.",
            "nombre_programa.string" => "El nombre del programa debe ser una cadena de texto.",
            "nombre_programa.min" => "El nombre del programa debe tener al menos 5 caracteres.",
            "nombre_programa.max" => "El nombre del programa no debe exceder los 255 caracteres.",

            "modalidad.required" => "La modalidad es obligatoria.",
            "modalidad.in" => "La modalidad debe ser Interna o Externa.",

            "tipo_programa.required" => "El tipo de programa es obligatorio.",
            "tipo_programa.exists" => "El tipo de programa seleccionado no es válido.",

            "otro_programa.string" => "El otro programa debe ser una cadena de texto.",
            "otro_programa.min" => "El otro programa debe tener al menos 5 caracteres.",
            "otro_programa.max" => "El otro programa no debe exceder los 500 caracteres.",

            "actividades.required" => "Las actividades del programa son obligatorias.",
            "actividades.string" => "Las actividades deben ser una cadena de texto.",
            "actividades.min" => "Las actividades deben tener al menos 5 caracteres.",
            "actividades.max" => "Las actividades no debe exceder los 500 caracteres.",
        ];
    }
}
