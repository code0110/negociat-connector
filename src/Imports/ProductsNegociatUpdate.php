<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsNegociatUpdate implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $product = Product::where('cod', $row[2])->first();

            if($product){      
            $product->update(array("stoc" => $row[3], "pret_lista" => $row[6])); 
        }

        }
    }
}

