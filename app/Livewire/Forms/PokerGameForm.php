<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PokerGameForm extends Form
{
    #[Validate('required|string|max:255')]
    public string $caption = '';

    #[Validate('required|array|min:1')]
    public array $weights = [];

    #[Validate('required|integer')]
    public int $created_by;

    public function messages(): array
    {
        return [
            'caption.required' => 'A legenda é obrigatória.',
            'caption.string' => 'A legenda deve ser um texto.',
            'caption.max' => 'A legenda não pode exceder 255 caracteres.',
            'weights.array' => 'O sistema de votação deve ser uma lista de pesos.',
            'weights.min' => 'Você deve selecionar pelo menos um peso para o sistema de votação.',
            'created_by.required' => 'O campo "created_by" é obrigatório.',
            'created_by.integer' => 'O campo "created_by" deve ser um número inteiro.',
        ];
    }
}