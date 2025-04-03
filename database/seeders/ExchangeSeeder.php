<?php

namespace Database\Seeders;

use App\Models\Exchange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exchange::factory()->create([
            'name' => 'OKX',
            'logo' => 'https://www.okx.com/cdn/oksupport/asset/currency/icon/okb20230419112935.png',
            'api_url' => 'okx_api_url',
        ]);
    }
}
