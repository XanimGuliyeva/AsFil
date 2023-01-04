<?php

namespace App\Imports;

use App\Products\Products;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Products([
            'ad' => 'Filter PN-'.$row[0],
            'ambar_kodu'    => $row[0],
            'istehsalci_kodu'    => $row[0],
            'filtr'    => $row[2],
            'teyinat'    => 7,
            'qiymet'    => $row[3],
            'istehsalci'    => $row[1]
        ]);
    }
}
