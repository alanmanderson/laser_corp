<?php namespace App\Alerts;
use \SimpleXMLElement;

interface DiscoveryAlertHandlerInterface {
    public function handle(SimpleXMLElement $xmlAlert);
}
