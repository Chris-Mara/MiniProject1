<?php

$filename = '../records.csv';
$program = new main($filename);

//Main Class
class main {
    public function __construct($filename) {
        $records = csv::getRecords($filename);
        $table = html::genTable($records, "table-striped");
        system::printPage($table);
    }
}

//Class for iterating through the csv file
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
    public function __construct( Array $fieldNames = null, Array $values = null) {

        $record = array_combine($fieldNames, $values);

        foreach ($record as $field => $value) {
            $this->createProperty($field, $value);
        }

    }

    public function returnArray() {
        $array = (array) $this;
        return $array;
    }

    public function createProperty($name = 'month', $value = 'May') {
        $this->{$name} = $value;
    }
}

//Class for creating record objects
class recordFactory {
    public static function create(Array $fieldNames = null, Array $values = null) {
        $record = new record($fieldNames, $values);
        return $record;
    }
}

//Class for creating the html of the table
class html
{
    static public function genTable(Array $records, String $style) {
        $table = "<table class='table $style>'";
        foreach ($records as $record) {
            $table .= self::genRow($record);
        }
        $table .= "</table>";
        return $table;
    }

    static function genRow(Array $array) {
        $row = "<tr>";
        foreach ($array as $key => $value) {
            $row .= "<td>$value</td>";
        }
        $row .= "</tr>";
        return $row;
    }

    static function genHeader(Array $array) {
        return null;
    }

}
//Class for printing our the page produced
class system {
    static public function printPage($page) {
        echo $page;
    }
}

?>