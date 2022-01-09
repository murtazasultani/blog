<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class FetchPostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_fetch_posts()
    {
        Post::factory()->count(50)->create();

        $response = $this->json('GET', 'api/posts');

        $response->assertOk();

    }

    /** @test */
    public function it_can_fetch_only_published_posts()
    {
        Post::factory()->count(50)->create();

        $response = $this->json('GET', 'api/posts');

        $response->assertOk();

        $response->assertJsonCount(Post::where('published', True)->count());

        $response->assertJsonStructure([
            '*' => [
                'slug',
                'title',
                'content',
                'published',
                'publish_date',
                'user_id',
                'created_at',
                'updated_at',
                'comments' => [
                    '*' => [
                        'name',
                        'email',
                        'comment',
                        'post_id',
                        'comment_id',
                        'created_at',
                        'updated_at',
                        'comments'
                    ]
                ]
            ]
        ]);
    }
}
