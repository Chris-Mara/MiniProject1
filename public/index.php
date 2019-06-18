<?php

$filename = '../records.csv';
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

        $file = fopen($filename, "r");

        $fieldNames = array();

        $counter = 0;

        while(! feof($file)) {
            $record = fgetcsv($file);
            if ($counter == 0) {
                $fieldNames = $record;
            } else {
                $records[] = recordFactory::create($fieldNames, $record);
            }
            $counter++;
        }

        fclose($file);
        return $records;

    }
}

//Class for a row or 'record' in the table
class record {
    public function __construct( Array $record = null) {
        print_r($record);
        $this->createProperty();
    }

    public function createProperty($name = 'month', $value = 'May') {
        $this->{$name} = $value;
    }
}

//Class for creating record objects
class recordFactory {
    public static function create(Array $array = null) {
        $record = new record($array);
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