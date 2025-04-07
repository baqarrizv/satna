<?php
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Setting;
use Illuminate\Support\Facades\DB;

// Update using DB query builder to avoid model events and encryption/decryption
DB::table('settings')->where('id', 1)->update([
    'logo_light' => 'settings/Setna.jpg',
    'logo_dark' => 'settings/Setna.jpg'
]);

echo "Logo settings updated successfully!\n"; 