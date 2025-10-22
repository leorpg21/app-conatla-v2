<?php

namespace App\Livewire\Forms\Formularios;

use App\Models\Documento;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ValidarDocumentos extends Form
{
    public $id_documento;
    #[Validate('required|string|min:2')]
    public $tipo_documento = '';

    #[Validate('required|string|min:5|max:40')]
    public $numero_documento = '';

    public function loadDocumento($id_documento)
    {
        $documento = Documento::find($id_documento);
        $this->tipo_documento = $documento->tipo_documento;
        $this->numero_documento = $documento->numero_documento;
        $this->id_documento = $id_documento;
    }

    public function updateDocumento()
    {
        $documento = Documento::find($this->id_documento);
        $documento->update([
            'tipo_documento'   => $this->tipo_documento,
            'numero_documento' => $this->numero_documento
        ]);
    }
}
