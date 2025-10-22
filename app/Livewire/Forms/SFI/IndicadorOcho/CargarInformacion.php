<?php

namespace App\Livewire\Forms\SFI\IndicadorOcho;

use App\Imports\SFIOchoImport;
use App\Models\SFIndicadorOcho;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
            SFIndicadorOcho::truncate();
            
            DB::beginTransaction();

            Excel::import(new SFIOchoImport, $this->documento->getRealPath());

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
