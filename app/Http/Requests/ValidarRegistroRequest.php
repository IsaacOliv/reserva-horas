<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ValidarRegistroRequest extends FormRequest
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
                'nome' => ['required','min:3'],
                'email' => ['required','email:dns','unique:users'],
                'senha' => ['required', Password::min(8)->letters()]
        ];
    }
    public function messages()
    {
        return [
                'nome.required' => 'É necessario informar seu nome!',
                'nome.min' => 'O campo nome deve ter ao menos 3 caracteres',
                'email.required' => 'É necessario informar seu email!',
                'email.email' => 'Por favor, informe um email valido!',
                'email.unique' => 'E-mail já cadastrado!',
                'senha.required' => 'É necessario informar uma senha!',
                'senha' => [
                    'min' => 'A senha deve ser composta por pelo menos 8 digitos',
                    'letters' => 'A senha deve incluir ao menos uma letra'
                ],
        ];
    }
}
