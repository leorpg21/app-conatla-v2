<?php

namespace App\Livewire\Forms\SFI\IndicadorSeis;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SFISeisImport;
use App\Models\SFIndicadorSeis;
use Illuminate\Support\Facades\DB;

class CargarInformacion extends Form
{
    use WithFileUploads;

    #[Validate('required|file|mimes:xlsx|max:10240')]
    public $documento;

    // #[Validate('required|in:add,truncate')]
    // public $mode = 'truncate';

    public $message = '';
    public $getError = '';

    public function importar()
    {
        $this->validate();
        
        try {
            // if ($this->mode === 'truncate') {
            // }
            SFIndicadorSeis::truncate();
            DB::beginTransaction();

            Excel::import(new SFISeisImport, $this->documento->getRealPath());

            DB::commit();

            $this->message = 'success';
            // session()->flash('success', 'Importación completada correctamente.');

        } catch (\Throwable $e) {
            DB::beginTransaction();
            DB::rollBack();
            // dd($e);
            $this->message = 'error';

            $this->getError = $e->getMessage();
           
        }
    }


}
