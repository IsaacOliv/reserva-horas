<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalhesDaContaRequest extends FormRequest
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
            'imagem_time' => 'mimes:jpg,bmp,png|size:4000',
            'sobrenome' => 'nullable|min:3|max:50|regex:/^[a-zA-Z]+$/u',
            'email' => 'required|max:100|email|unique:users,email,'.$this->id,
            'endereco' => 'nullable|min:3|max:200',
            'cpf' => 'required|digits:11',
            'telefone' => 'required|digits:11',
            'dt_nascimento' => 'date|required|before:'.date('Y-m-d'),
        ];
    }

    public function messages()
    {
        return [
            'imagem_time.mimes' => 'Formato de imagem invalido! Formatos permitidos, jpg, bmp e png.',
            'imagem_time.size' => 'O tamanho maximo permitido da imagem é 4MB.',
            'sobrenome.min' => 'Sobrenome tem minimo de 3 (três) digitos.',
            'sobrenome.max' => 'Sobrenome tem limite maximo de 55 (cincenta e cinco) digitos.',
            'sobrenome.regex' => 'São permitidos apenas letras.',
            'email.required' => 'Email é um campo obrigatorio.',
            'email.email' => 'O email não esta no formato correto.',
            'email.unique' => 'Já existe alguem com esse email cadastrado.',
            'email.max' => 'Email tem tamanho maximo de 100 (cem) digitos.',
            'endereco.min' => 'Preencha o endereço completo.',
            'endereco.max' => 'Endereco tem limite maximo 200(duzentos) caracteres.',
            'cpf.required' => 'CPF é um campo obrigatorio.',
            'cpf.digits' => 'O CPF é composto por exatamente 11 numeros.',
            'telefone.required' => 'Telefone é um campo obrigatorio.',
            'telefone.digits' => 'O telefone é composto por exatamente 11 numeros.',
            'dt_nascimento.required' => 'Data é um campo obrigatorio.',
            'dt_nascimento.date' => 'A data não está em um formato valido.',
            'dt_nascimento.before' => 'Data invalida.',
        ];
    }
}
