<?php namespace App\Alerts;

use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\SiteRepositoryInterface;
use App\Repositories\DeviceRepositoryInterface;
use App\Repositories\AlertRepositoryInterface;

use \SimpleXMLElement;

class DiscoveryAlertHandler extends AlertHandler implements DiscoveryAlertHandlerInterface {
    protected $customerRepo;
    protected $siteRepo;
    protected $deviceRepo;
    protected $alertRepo;
    public function __construct(
        CustomerRepositoryInterface $customerRepo,
        SiteRepositoryInterface $siteRepo,
        DeviceRepositoryInterface $deviceRepo,
        AlertRepositoryInterface $alertRepo)
    {
        $this->customerRepo = $customerRepo;
        $this->siteRepo = $siteRepo;
        $this->deviceRepo = $deviceRepo;
        $this->alertRepo = $alertRepo;
    }

    public function handle(SimpleXMLElement $xmlAlert){
        parent::handle($xmlAlert);
        $customer = $this->customerRepo->findOrCreate([
            'vendor_id' => strval($xmlAlert->Customer->Id),
            'name' => strval($xmlAlert->Customer->Name)
        ]);

        $site = $this->siteRepo->findOrCreate([
            'vendor_id' => strval($xmlAlert->Site->Id),
            'name' => strval($xmlAlert->Site->Name),
            'customer_id' => $customer->id
        ]);

       foreach($xmlAlert->Devices->children() as $xmlDevice){
            $vendorId = strval($xmlDevice->Id);
            $device = $this->deviceRepo->findByVendorId($vendorId);
            if ($device->count() == 0){
                $device = $this->deviceRepo->create(
                    [
                        "vendor_id" => $vendorId,
                        "device_key" => strval($xmlDevice->DeviceKey),
                        "manufacturer" => strval($xmlDevice->Manufacturer),
                        "name" => strval($xmlDevice->Name),
                        "ip_address" => strval($xmlDevice->IPAddress),
                        "mac_address" => strval($xmlDevice->MACAddress),
                        "serial_number" => strval($xmlDevice->Serial),
                        "firmware_version" => strval($xmlDevice->FirmwareVersion),
                        "site_id" => "$site->id",
                    ]);
            }
        }
        return $this->alertRepo->create(['customer_id' => $customer->id]);
    }

}
