<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ["vendor_id","device_key", "manufacturer", "name", "ip_address", "mac_address", "serial_number",
                           "firmware_date", "firmware_version", "site_id"];
}
