<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [];

        $data = file_get_contents(base_path('data/languages.json'));
        $data = json_decode($data);

        foreach ($data as $item) {
            $languages[] = [
                'name' => $item->name,
                'language_code' => $item->code,
                'native_name' => $item->native_name,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        DB::table('languages')->insert($languages);

        $this->command->info('Languages data table seeded!');
    }
}
