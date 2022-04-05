<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => (integer)$this->id,
            'nome'          => (string)$this->nome,
            'autor'         => (string)$this->autor,
            'categoria'     => (string)$this->categoria,
            'codigo'        => (string)$this->codigo,
            'tipo'          => (string)$this->tipo,
            'tamanho'       => $this->tamanho,
            'created_at'    => date('d/m/Y H:i:s', strtotime($this->created_at)),
            'updated_at'    => date('d/m/Y H:i:s', strtotime($this->updated_at)),
        ];
    }
}
