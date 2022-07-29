<?php

namespace Botble\NegociatConnector\Exports;

use Botble\NegociatConnector\Models\NegociatProduct;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Table\Supports\TableExportHandler;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NegociatProduct::select("id_n", "cod_pack", "nume_produs", "pret_neg", "pret_lista_neg", "stoc")->get();
    }

    public function headings(): array
    {
        return ["ID PRODUS", "Cod produs", "Denumire Produs", "Pret de vanzare", "Pret de lista", "Cantitate"];
    }
    
}
