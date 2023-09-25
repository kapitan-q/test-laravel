<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    private static $fileName = 'data.csv';
    private static $delimiter = ',';
    private static $enclosure = '"';
    private static $escape = '\\';
    private static $columns = ['name','price','bedrooms','bathrooms','storeys','garages'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen(__DIR__ .'/data/'. self::$fileName, 'r');
        if (!$file) {
            throw new \Exception('data file not found');
        }

        $columns = fgetcsv($file, null, self::$delimiter, self::$enclosure, self::$escape);
        $columns = array_map('trim', $columns);
        $columns = array_map('strtolower', $columns);

        $checkColumns = array_intersect( self::$columns, $columns );
        if (count($checkColumns) < count(self::$columns)) {
            throw new \Exception('data file is corrupted');
        }

        while($data = fgetcsv($file, null, self::$delimiter, self::$enclosure, self::$escape)) {
            if (count($data) < count(self::$columns)) {
                throw new \Exception('data file is corrupted');
            }

            $data = array_map('trim', $data);
            $data = array_combine($columns, $data);

            DB::table('data')->insert([
                'name'           => $data['name'],
                'bedrooms_count' => $data['bedrooms'],
                'bathroom_count' => $data['bathrooms'],
                'storey_count'   => $data['storeys'],
                'garage_count'   => $data['garages'],
                'price'          => $data['price'],
            ]);
        }
    }
}
