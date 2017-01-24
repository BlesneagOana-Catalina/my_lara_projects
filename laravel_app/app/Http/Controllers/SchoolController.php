<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class SchoolController extends Controller
{
	public function getSchool()
	{ 
	/*
     $query = new \WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 20,
            'order' => 'ASC',
            'orderby' => 'post_title',
        ));

        $posts = $query->get_posts();
	    $data=array("schools"=>$posts);
        return view('welcome')->with($data);
		*/	
$post = new \App\Post;
$post->save();
$post->post_title="New";
$post->post_content="New Content";
$post->meta->username = 'juniorgrossi';
$post->meta->url = 'http://grossi.io';
$post->save();
		$posts = \App\Post::published()->get();
		$data=array("schools"=>$posts);
        return view('welcome')->with($data);

		}
}
