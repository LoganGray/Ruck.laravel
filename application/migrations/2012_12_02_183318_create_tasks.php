<?php

class Create_Tasks {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the Tasks table.
		Schema::create('tasks', function ($table) {
			$table->increments('id');
			$table->string('description', 255);
			$table->text('notes');
			$table->integer('list_id');
			$table->integer('status_id');
			$table->integer('context_id');
			$table->date('due');
			$table->timestamps();  
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		// Kill the Tasks table.
		Schema::drop('tasks');
	}

}