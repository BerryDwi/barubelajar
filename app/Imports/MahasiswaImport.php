<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;


class MahasiswaImport implements ToModel
{
    public function model(array $row)
    {
        if (!isset($row[1], $row[2], $row[3])) {
            return null;
        }


        return new Mahasiswa([
            'nama'  => $row[1],
            'nim'   => $row[2],
            'kelas' => $row[3],
        ]);
    }
}
