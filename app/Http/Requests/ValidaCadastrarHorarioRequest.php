<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaCadastrarHorarioRequest extends FormRequest
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
                'dia_semana' => [
                    'integer',
                    'between:1,7',
                    'required'
                ],
                'hora_inicio' => [
                    'required',
                    'date_format:H:i',
                    \Illuminate\Validation\Rule::unique('horarios', 'hora_inicio')
                        ->where('dia_semana', $this->input('dia_semana')),
                ],
                'hora_fim' => [
                    'required',
                    'date_format:H:i',
                    \Illuminate\Validation\Rule::unique('horarios', 'hora_fim')
                        ->where('dia_semana', $this->input('dia_semana'))
                ]
        ];
    }
    public function messages()
    {
        return [
            'dia_semana.between' => 'Selecione um dia de domingo a sabado',
            'dia_semana.required' => 'É necessario informa um dia da semana',
            'hora_inicio.required' => 'É necessario informa uma hora de inicio',
            'hora_inicio.date_format' => 'O formato inserido na hora inicio não é suportado',
            'hora_inicio.unique' => 'Não é possivel inserir uma hora inicio e dia da semana que já existem',
            'hora_fim.required' => 'É necessario informa uma hora de inicio',
            'hora_fim.date_format' => 'O formato inserido na hora fim não é suportado',
            'hora_fim.unique' => 'Não é possivel inserir uma hora fim e dia da semana que já existem',
        ];
    }
}
