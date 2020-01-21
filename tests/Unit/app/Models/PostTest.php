<?php

namespace Tests\Unit\App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    public function testAttributeFillable()
    {
        $post = new Post();

        $this->assertEquals(['title', 'category_id'], $post->getFillable());
    }

    public function testDateFormat()
    {
        $post = new Post();

        $this->assertEquals('d-m-Y H:i:s', $post->getDateFormat());
    }

    public function testAttributeHidden()
    {
        $post = new Post();

        $this->assertEquals(['category_id'], $post->getHidden());
    }

    public function testRelationshipWithPost()
    {
        $post = new Post();
        $relationWithCategory = $post->category();

        $this->assertInstanceOf(BelongsTo::class, $relationWithCategory);
        $this->assertEquals('category_id', $relationWithCategory->getForeignKey());
        $this->assertEquals('categories.id', $relationWithCategory->getQualifiedOwnerKeyName());
        $this->assertEquals('posts.category_id', $relationWithCategory->getQualifiedForeignKey());
    }
}
