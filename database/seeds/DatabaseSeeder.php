<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	DB::statement('SET FOREIGN_KEY_CHECKS=0'); // dont check relationship
    	DB::table('users')->truncate(); // Delete table data
    	DB::table('roles')->truncate();
    	DB::table('photos')->truncate();
    	DB::table('posts')->truncate();
    	DB::table('categories')->truncate();
    	DB::table('comments')->truncate();
    	DB::table('comment_replies')->truncate();


        factory(App\User::class,10)->create()->each(function($user){
        	$user->posts()->save(factory(App\Post::class)->make());
        });

        factory(App\Role::class,3)->create();

        factory(App\Category::class,4)->create();

        factory(App\Photo::class,1)->create();

        factory(App\Comment::class,10)->create()->each(function($cr){
        	$cr->replies()->save(factory(App\CommentReply::class)->make());
        });

    }
}
