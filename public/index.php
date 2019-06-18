<?php


//Main Class
class main {

}

//Class for iterating through the
class csv {
    static public function getRecords($filename) {
        $file = fopen($filename, "r");

        while(! feof($file)) {
            $record = fgetcsv($file);

            $records[] = $record;
        }

        fclose($file);
        return $records;

    }
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
class html {

}

//Class for printing our the page produced
class page {
    static public function printPage($page) {
        echo $page;
    }
}

?>