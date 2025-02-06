<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Component;
use App\Models\Icon;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AdminComponentTest extends TestCase
{
    use RefreshDatabase;

    private function actingAsTestAdmin(): static
    {
        $this->get(route('admin.createUser'));

        $admin = User::query()->where('email', 'admin@admin.com')->first();

        return $this->actingAs($admin);
    }

    #[Test]
    public function it_can_create_a_component()
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

        $data = [
            'category_id' => $category->id,
            'name' => 'Test Component',
            'description' => 'Test Component',
            'code_html' => '<div></div>',
            'code_vue' => '<div></div>',
            'code_react' => '<div></div>',
        ];

        $response = $this->actingAsTestAdmin()
            ->post(route('admin.components.store'), $data);

        $response->assertRedirect(route('admin.components.index'));
        $this->assertDatabaseHas('components', ['name' => 'Test Component']);
    }

    #[Test]
    public function it_can_update_a_component()
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

        $component = Component::query()->create([
            'category_id' => $category->id,
            'name' => 'Test Component',
            'description' => 'Test Component',
            'code_html' => '<div></div>',
            'code_vue' => '<div></div>',
            'code_react' => '<div></div>',
        ]);

        $data = [
            'category_id' => $category->id,
            'name' => 'Test Update Component',
            'description' => 'Test Update Component',
            'code_html' => '<div>Updated</div>',
            'code_vue' => '<div>Updated</div>',
            'code_react' => '<div>Updated</div>',
        ];

        $response = $this->actingAsTestAdmin()
            ->put(route('admin.components.update', $component->id), $data);

        $response->assertRedirect(route('admin.components.index'));
        $this->assertDatabaseHas('components', ['name' => 'Test Update Component']);
    }

    #[Test]
    public function it_can_delete_a_component()
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

        $component = Component::query()->create([
            'category_id' => $category->id,
            'name' => 'Test Component',
            'description' => 'Test Component',
            'code_html' => '<div></div>',
            'code_vue' => '<div></div>',
            'code_react' => '<div></div>',
        ]);

        $response = $this->actingAsTestAdmin()
            ->delete(route('admin.components.destroy', $component->id));

        $response->assertRedirect(route('admin.components.index'));
        $this->assertDatabaseMissing('components', ['id' => $component->id]);
    }
}
