<?php
namespace App\Repositories;

class Excel extends \Maatwebsite\Excel\Files\NewExcelFile {

    public function getFilename()
    {
        return 'applicantsdata';
    }
}