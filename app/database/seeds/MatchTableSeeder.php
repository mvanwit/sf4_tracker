<?php


class MatchTableSeeder extends Seeder 
{

	public function run()
	{
		DB::table('matches')->delete();

		Match::create(array(
			'myChar' => 'Akuma',
			'opponentChar' => 'Cammy',
			'result' => 'Win'
		));

		Match::create(array(
			'myChar' => 'Juri',
			'opponentChar' => 'Chun-li',
			'result' => 'Draw'
		));

		Match::create(array(
			'myChar' => 'Ryu',
			'opponentChar' => 'Rose',
			'result' => 'Loss'
		));
	}

}