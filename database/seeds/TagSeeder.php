<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags= ['front end', 'back end', 'laravel', 'franco', 'pippo'];

        foreach($tags as $tag){
            $newTag= new Tag;

            $newTag->name=$tag;
            $newTag->slug = Str::of($tag)->slug('-');
            
            $newTag->save();
        }
    }
}
