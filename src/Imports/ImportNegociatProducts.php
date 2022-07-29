<?php

namespace Botble\NegociatConnector\Imports;

use Botble\NegociatConnector\Models\NegociatProduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Hash;

class ImportNegociatProducts implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NegociatProduct([
            'id_n' => $row[0],
            'nume_produs' => $row[3], 
            'cod' => $row[1],
            'cod_pack' =>$row[2],
            'pret_neg' => $row[4],
            'pret_lista_neg' => $row[5],
        ]);
    }
}
