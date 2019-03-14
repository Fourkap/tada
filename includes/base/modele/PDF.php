<?php

namespace Modele;

class PDF
{
    protected $database;

    public function __construct($path)
    {
        $array = [];

        if (file_exists($path)) {
            if (!($handle = fopen($path, "r")) !== false) {
                throw new Exception('Impossible d\'ouvrir le fichier CSV.');
            }
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $array[] = $this->toAssoc($data);
            }
            fclose($handle);
        }
        $this->database = $array;
    }

    public function toAssoc()
    {
        return [];
    }

//    public function is_exist($path)
//    {
//        if (!file_exists($path)) {
//            $output = fopen($path, 'w');
//            fputcsv($output, array('id', 'texte', 'termine', 'date_deb', 'date_fin', 'adresse_ip'));
//            fclose($output);
//        }
//    }
}