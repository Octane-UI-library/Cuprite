<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Icon;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AdminCategoryTest extends TestCase
{
    use RefreshDatabase;

    private function actingAsTestAdmin(): static
    {
        $this->get(route('admin.createUser'));
        $admin = User::query()->where('email', 'admin@admin.com')->first();

        return $this->actingAs($admin);
    }

    #[Test]
    public function it_can_create_a_category()
    {
        $icon = Icon::query()->create([
            'name' => 'Sample Icon',
            'class' => 'icon-class',
        ]);

        $data = [
            'name' => 'Test Category',
            'description' => 'Test Description',
            'slug' => 'test-category',
            'icon_id' => $icon->id,
        ];

        $response = $this->actingAsTestAdmin()
            ->post(route('admin.categories.store'), $data);

        $response->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseHas('categories', ['name' => 'Test Category']);
    }

    #[Test]
    public function it_can_update_a_category()
    {
        $icon = Icon::query()->create([
            'name' => 'Sample Icon',
            'class' => 'icon-class',
        ]);

        $category = Category::query()->create([
            'name' => 'Old Category',
            'description' => 'Old Description',
            'slug' => 'old-category',
            'icon_id' => $icon->id,
        ]);

        $data = [
            'name' => 'Updated Category',
            'description' => 'Updated Description',
            'slug' => 'updated-category',
            'icon_id' => $icon->id,
        ];

        $response = $this->actingAsTestAdmin()
            ->put(route('admin.categories.update', $category), $data);

        $response->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseHas('categories', ['name' => 'Updated Category']);
    }

    #[Test]
    public function it_can_delete_a_category()
    {
        $icon = Icon::query()->create([
            'name' => 'Test Icon',
            'class' => 'icon-class',
        ]);

        $category = Category::query()->create([
            'name' => 'Test Category',
            'description' => 'Test Description',
            'slug' => 'test-category',
            'icon_id' => $icon->id,
        ]);

        $response = $this->actingAsTestAdmin()
            ->delete(route('admin.categories.destroy', $category));

        $response->assertRedirect(route('admin.categories.index'));
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
