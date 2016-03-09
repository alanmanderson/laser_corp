<?php namespace App\Alerts;
use \SimpleXMLElement;

interface AlertHandlerInterface {
    public function handle(SimpleXMLElement $xmlAlert);
}
