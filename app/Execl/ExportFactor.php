<?php
namespace App\Execl;

use App\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportFactor implements FromCollection
{

    public function __construct(public $data){}

    public function collection()
    {
        return collect($this->data);
    }
}
