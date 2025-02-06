<?php

namespace Tests\Feature;

use App\Models\Icon;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AdminIconTest extends TestCase
{
    use RefreshDatabase;

    private function actingAsTestAdmin(): static
    {
        $this->get(route('admin.createUser'));
        $admin = User::query()->where('email', 'admin@admin.com')->first();

        return $this->actingAs($admin);
    }

    #[Test]
    public function it_can_create_an_icon()
    {
        $data = [
            'name' => 'Test Icon',
            'class' => 'icon-test-class',
        ];

        $response = $this->actingAsTestAdmin()
            ->post(route('admin.icons.store'), $data);

        $response->assertRedirect(route('admin.icons.index'));
        $this->assertDatabaseHas('icons', ['name' => 'Test Icon']);
    }

    #[Test]
    public function it_can_update_an_icon()
    {
        $icon = Icon::query()->create(['name' => 'Old Icon', 'class' => 'icon-class']);

        $data = [
            'name' => 'Updated Icon',
            'class' => 'updated-icon-class',
        ];

        $response = $this->actingAsTestAdmin()
            ->put(route('admin.icons.update', $icon), $data);

        $response->assertRedirect(route('admin.icons.index'));
        $this->assertDatabaseHas('icons', ['name' => 'Updated Icon']);
    }

    #[Test]
    public function it_can_delete_an_icon()
    {
        $icon = Icon::query()->create(['name' => 'Icon to Delete', 'class' => 'icon-delete-class']);

        $response = $this->actingAsTestAdmin()
            ->delete(route('admin.icons.destroy', $icon));

        $response->assertRedirect(route('admin.icons.index'));
        $this->assertDatabaseMissing('icons', ['id' => $icon->id]);
    }
}
