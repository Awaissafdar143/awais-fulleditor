<?php

namespace Database\Seeders;

use App\Models\seo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class metaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        seo::insert([
            'title' => 'Home- One Stop Solution | MA-Tech Solutions BPO',
            'description' => 'Home- One Stop Solution | MA-Tech Solutions BPO',
            'keyword' => 'Home- One Stop Solution | MA-Tech Solutions BPO',
            'ogimage' => 'Home- One Stop Solution | MA-Tech Solutions BPO',
        ]);
        seo::insert([
            'title' => 'portfolio- One Stop Solution | MA-Tech Solutions BPO',
            'description' => 'portfolio- One Stop Solution | MA-Tech Solutions BPO',
            'keyword' => 'portfolio- One Stop Solution | MA-Tech Solutions BPO',
            'ogimage' => 'portfolio- One Stop Solution | MA-Tech Solutions BPO',
        ]);
        seo::insert([
            'title' => 'clients- One Stop Solution | MA-Tech Solutions BPO',
            'description' => 'clients- One Stop Solution | MA-Tech Solutions BPO',
            'keyword' => 'clients- One Stop Solution | MA-Tech Solutions BPO',
            'ogimage' => 'clients- One Stop Solution | MA-Tech Solutions BPO',
        ]);
        seo::insert([
            'title' => 'services- One Stop Solution | MA-Tech Solutions BPO',
            'description' => 'services- One Stop Solution | MA-Tech Solutions BPO',
            'keyword' => 'services- One Stop Solution | MA-Tech Solutions BPO',
            'ogimage' => 'services- One Stop Solution | MA-Tech Solutions BPO',
        ]);
        seo::insert([
            'title' => 'blogs- One Stop Solution | MA-Tech Solutions BPO',
            'description' => 'blogs- One Stop Solution | MA-Tech Solutions BPO',
            'keyword' => 'blogs- One Stop Solution | MA-Tech Solutions BPO',
            'ogimage' => 'blogs- One Stop Solution | MA-Tech Solutions BPO',
        ]);
        seo::insert([
            'title' => 'caseStudies- One Stop Solution | MA-Tech Solutions BPO',
            'description' => 'caseStudies- One Stop Solution | MA-Tech Solutions BPO',
            'keyword' => 'caseStudies- One Stop Solution | MA-Tech Solutions BPO',
            'ogimage' => 'caseStudies- One Stop Solution | MA-Tech Solutions BPO',
        ]);
        seo::insert([
            'title' => 'contact- One Stop Solution | MA-Tech Solutions BPO',
            'description' => 'contact- One Stop Solution | MA-Tech Solutions BPO',
            'keyword' => 'contact- One Stop Solution | MA-Tech Solutions BPO',
            'ogimage' => 'contact- One Stop Solution | MA-Tech Solutions BPO',
        ]);
    }
}
