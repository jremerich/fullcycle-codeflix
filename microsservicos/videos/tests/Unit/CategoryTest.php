<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    public function testFillableAttribute()
    {
        $fillable = ['name', 'description', 'is_active'];
        $category = new Category();
        $this->assertEquals($fillable,$category->getFillable());
    }

    public function testIfUseTraits() {
        $traits = [SoftDeletes::class, Uuid::class];
        $categoryTraits = array_keys(class_uses(Category::class));
        $this->assertEquals($traits,$categoryTraits);
    }

    public function testDatesAttribute()
    {
        $dates = ['deleted_at', 'created_at', 'updated_at'];
        $category = new Category();
        $this->assertEquals($dates, array_values($category->getDates()));
    }

    public function testIfKeyIsStringAttribute()
    {
        $category = new Category();
        $this->assertIsString($category->getKeyType());
    }

    public function testIncrementingAttribute()
    {
        $category = new Category();
        $this->assertFalse($category->getIncrementing());
    }
}
