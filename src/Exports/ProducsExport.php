<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProducsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Product::all();
        return Product::select("id_n", "cod_pack", "nume_produs", "pret_neg", "pret_lista_neg", "stoc")->get();
    }

    public function headings(): array
    {
        return ["ID PRODUS", "Cod produs", "Denumire Produs", "Pret de vanzare", "Pret de lista", "Cantitate"];
    }
    
}
