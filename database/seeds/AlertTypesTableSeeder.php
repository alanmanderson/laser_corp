<?php

use Illuminate\Database\Seeder;
use App\Models\AlertType;
use App\Models\AlertTypeField;

class AlertTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = 'new_device_alerts';
        $alertType = AlertType::create(['name' => 'New device', 'db_table_name' => $tableName]);

        DB::statement(
            "CREATE TABLE $tableName (
                id int(10) unsigned NOT NULL AUTO_INCREMENT,
                vendor_id varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                manufacturer varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                alert_vendor_id varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                PRIMARY KEY (id)
             ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci"
        );

        $alertType->alertTypeFields()->create([
            'xml_field' => 'Devices[]/Id',
            'table_field' => 'vendor_id'
        ]);

        $alertType->alertTypeFields()->create([
            'xml_field' => 'Devices[]/Manufacturer',
            'table_field' => 'manufacturer'
        ]);

        $alertType->alertTypeFields()->create([
            'xml_field' => 'Devices[]/Alerts[]/AlertId',
            'table_field' => 'alert_vendor_id'
        ]);
    }
}
