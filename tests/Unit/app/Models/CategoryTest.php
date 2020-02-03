<?php

namespace Tests\Unit\App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;
use Mockery;
class CategoryTest extends TestCase
{
    public function testAttributeFillable()
    {
        $category = new Category();
        $this->assertEquals(['name'], $category->getFillable());
        $this->assertEquals('categories', $category->getTable());
    }

    public function testDateFormat()
    {
        $category = new Category();
        $this->assertEquals('d-m-Y H:i:s', $category->getDateFormat());
    }

    public function testAttributeHidden()
    {
        $category = new Category();
        $this->assertEquals(['name'], $category->getHidden());
    }

    public function testTableName()
    {
        $category = new Category();
        $this->assertEquals('categories', $category->getTable());
    }

    public function testRelationshipWithCategory()
    {
        $category = new Category();
        $relationWithPost = $category->posts();

        $this->assertInstanceOf(HasMany::class, $relationWithPost);
        $this->assertEquals('id', $relationWithPost->getLocalKeyName());
        $this->assertEquals('posts.category_id', $relationWithPost->getQualifiedForeignKeyName());
    }
}
