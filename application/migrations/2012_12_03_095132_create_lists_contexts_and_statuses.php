<?php

class Create_Lists_Contexts_And_Statuses {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the Lists table.
		Schema::create('lists', function ($table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('description', 255);
			$table->integer('status_id');
			$table->integer('parent_list_id');
			$table->timestamps();  
		});
		// Create the Contexts table.
		Schema::create('contexts', function ($table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('description', 255);
			$table->timestamps();  
		});
		// Create the Statuses table.
		Schema::create('statuses', function ($table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('description', 255);
			$table->string('type'); // Switch to ENUM('task', 'list') after creation.
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
		// Kill the new tables.
		Schema::drop('lists');
		Schema::drop('contexts');
		Schema::drop('statuses');
	}

}