<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;

class SyncProductJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        // dd('tes');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $credentials = [
            'username' => config('app.fastprint.username'),
            'password' => config('app.fastprint.password'),
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->asForm()->post('https://recruitment.fastprint.co.id/tes/api_tes_programmer', $credentials);

        if (!$response->successful()) {
            info('Failed to get data', ['status' => $response->getStatusCode()]);
        }
        $products = $response->json('data');
        foreach ($products as $product) {
            $caregory = Category::firstOrCreate(['name' => $product['kategori']]);
            $status = Status::firstOrCreate(['name' => $product['status']]);
            Product::updateOrCreate(
                ['external_id' => $product['id_produk']],
                [
                    'name' => $product['nama_produk'],
                    'price' => $product['harga'],
                    'category_id' => $caregory->id,
                    'status_id' => $status->id,
                ]
            );
        }
    }
}
