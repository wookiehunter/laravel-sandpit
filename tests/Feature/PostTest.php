<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class PostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostsPageWorks()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    public function testnewBlogGetsCreated() {
        // Arrange
        $object = new BlogPost();
        $object->title = 'New Title';
        $object->content = 'New Content';
        $object->save();

        $this->assertDatabaseHas('blog_posts', [
            'id' => $object->id
        ]);
    }

    public function testnewBlogGetsCreatedAndReturned() {
        // Arrange
        $post = new BlogPost();
        $post->title = 'New Title';
        $post->content = 'New Content';
        $post->save();

        // Act
        $response = $this->get('/posts');

        // Assert
        $response->assertSeeText('New Title');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New Title'
        ]);
    }

    public function testStoreIsValid()
    {
        $params = [
            'title' => 'Valid Title',
            'content' => 'At least 10 characters'
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post was created!');
    }

    // public function testStoreFail()
    // {
    //     $params = [
    //         'title' => 'xxx',
    //         'content' => 'xxx'
    //     ];

    //     $this->post('/posts', $params)
    //         ->assertStatus(302)
    //         ->assertSessionHas('errors');

    //     $messages = session('errors')->getMessages();

    //     $this->assertEquals($messages['title'][0], 'The title must be at least 5 characters.');
    //     $this->assertEquals($messages['content'][0], 'The content must be at least 10 characters.');
    // }

    public function testUpdateValid()
    {
        // Arrange
        $post = $this->createDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', $post->getAttributes());

        $params = [
            'title' => 'Updated Valid Title',
            'content' => 'At least 10 characters of updated text'
        ];

        $this->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post was updated!');
        // tests that original post content doesn't exist
        $this->assertDatabaseMissing('blog_posts', $post->getAttributes());
        // tests that new post content exists
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'Updated Valid Title'
        ]);
    }

    public function testDelete()
    {
        $post = $this->createDummyBlogPost();
        // verifies post was stored
        $this->assertDatabaseHas('blog_posts', $post->getAttributes());
        // tests the delete route
        $this->delete("/posts/{$post->id}")
        ->assertStatus(302)
        ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post was deleted!');
        // verifies post was deleted
        $this->assertDatabaseMissing('blog_posts', $post->getAttributes());
    }

    private function createDummyBlogPost(): BlogPost
    {
        $post = new BlogPost();
        $post->title = 'New Titles of post';
        $post->content = 'New Content of the post';
        $post->save();

        return $post;
    }
}
