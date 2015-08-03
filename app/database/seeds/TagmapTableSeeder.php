<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TagmapTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Tagmap::create([
				'question_id' => rand(1,10),
				'tag_id' => rand(1,10)	
			]);
		}
	}

}