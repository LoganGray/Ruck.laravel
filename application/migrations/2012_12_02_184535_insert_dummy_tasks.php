<?php

class Insert_Dummy_Tasks {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('tasks')->insert(array(
			'description' => 'Build simple task management system',
			'notes'  => 'Going to build a really basic task management system first.'
		));
		DB::table('tasks')->insert(array(
			'description' => 'Create the lists, contexts and statuses tables'
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('tasks')->delete();
	}

}