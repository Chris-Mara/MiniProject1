<?php

$filename = 'records.csv';
$program = new main($filename);

//Main Class
class main {
    private $html;
    public function __construct($filename) {
        $records = csv::getRecords($filename);
        $table = html::createTable($records);
        system::printPage($table);
    }
}

//Class for iterating through the
class csv {
    static public function getRecords($filename) {

        $records = 'another test';
        return $records;
        /*
        $file = fopen($filename, "r");

        while(! feof($file)) {
            $record = fgetcsv($file);

            $records[] = $record;
        }

        fclose($file);
        return $records;

    */}
}

//Class for a row or 'record' in the table
class record {

}

//Class for creating record objects
class recordFactory {
    public static function create(Array $array) {
        $record = new record();
        return $record;
    }
}

//Class for creating the html of the table
class html
{
    static public function createTable($records) {

        $table = $records;
        return $table;
    }
}
//Class for printing our the page produced
class system {
    static public function printPage($page) {
        echo $page;
    }
}

?>