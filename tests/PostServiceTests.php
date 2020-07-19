<?php

use IW\Workshop\PostService;
use PHPUnit\Framework\TestCase;
use IW\Workshop\Client\Curl;

use RuntimeException;

class PostServiceTests extends TestCase{


    //create post test
    public function testPostServicePostCreate(){

        $user = $this->createMock(Curl::class);

        $post_data = json_encode(array("id" => 101));

        $user->method("post")->willReturn(array(201, $post_data)); 

        $newPost = new PostService($user);

        $getPost=$newPost->createPost(array("data0", "data02"));
        $this->assertEquals(101, $getPost);
    }
    
    //testing another code then 201
    public function testPostServiceException(){

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Post could not be created.");
        
        $user = $this->createMock(Curl::class);
        
        $post_data = json_encode(array("id" => 101));
        
        $user->method("post")->willReturn(array(501, $post_data));   
        
        $newPost = new PostService($user);
        $newPost->createPost(array("data", "data2"));
    }
    //testing another type of code then integer
    public function testPostServiceExceptionType(){

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Post could not be created.");
        
        $user = $this->createMock(Curl::class);
        
        $post_data = json_encode(array("id" => 101));
        
        $user->method("post")->willReturn(array("201", $post_data));   
        
        $newPost = new PostService($user);
        $newPost->createPost(array("data", "data2"));
    }

/*
    public function testPostServiceValidJson(){
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('An id of article could not be retrieved.');

        $user = $this->createMock(Curl::class);

        $post_data = json_encode(array("id" => 101));
        $user->method("post")->willReturn(array(201, ""));

        $newPost = new PostService($user);
        $newPost->createPost(array("data", "data2"));
    }
*/
    
}