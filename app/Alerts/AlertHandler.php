<?php namespace App\Alerts;

use App\Models\AlertType;
use \SimpleXMLElement;
use \DB;

class AlertHandler implements AlertHandlerInterface {

    public function handle(SimpleXMLElement $xml){
        $alertsInserted = 0;
        $deviceIndex = 0;
        foreach($xml->Devices->children() as $xmlDevice) {
            $alertIndex = 0;
            foreach($xmlDevice->Alerts->children() as $xmlAlert){
                $alertTypes = AlertType::whereName($xmlAlert->Type)->get();
                if ($alertTypes->count() != 1) continue;
                $alert = $alertTypes->first();
                $fields = [];
                $values = [];
                foreach($alert->alertTypeFields as $field){
                    $fields[] = $field->table_field;
                    $values[] = $this->getValue($xml, $field->xml_field, [$deviceIndex, $alertIndex]);
                }
                $this->insertRaw($alert->db_table_name, $fields, $values);
                $alertsInserted++;
                $alertIndex++;
            }
            $deviceIndex++;
        } 
        return $alertsInserted;
    }

    public function getValue(SimpleXMLElement $xml, $path, array $indexes = array()){
        $pathElts = explode('/', $path);
        $curElt = $xml;
        $curIndex = 0;
        foreach($pathElts as $elt){
            if (strpos($elt, '[]') !== false){
                $elt = str_replace('[]', '', $elt);
                $curElt = $curElt->$elt->children()[$indexes[$curIndex]];
                $curIndex++;
            } else {
                $curElt = $curElt->$elt;
            }
        }
        return $curElt;
    }

    protected function insertRaw($tableName, array $fields, array $values){
        $query = "insert into $tableName (".implode(',', $fields).") values (".
                 implode(',', array_fill(0, count($fields), '?')) . ")";
        DB::insert($query, $values);
    }
}
