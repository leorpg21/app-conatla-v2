<?php

namespace App\Livewire\Forms\SFI\IndicadorSiete;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SFISieteImport;
use App\Models\SFIndicadorSiete;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class CargarInformacion extends Form
{
    #[Validate('required|file|mimes:xlsx|max:10240')]
    public $documento;

    #[Validate('required|in:add,truncate')]
    public $mode = 'truncate';

    public $message = '';
    public $getError = '';

    public function importar()
    {
        $this->validate();
        
        try {
            // if ($this->mode === 'truncate') {
            // }
            SFIndicadorSiete::truncate();
            DB::beginTransaction();

            Excel::import(new SFISieteImport, $this->documento->getRealPath());

            DB::commit();

            $this->message = 'success';

        } catch (\Throwable $e) {
            DB::beginTransaction();
            DB::rollBack();
            
            $this->message = 'error';

            $this->getError = $e->getMessage();

        }
    }
}
