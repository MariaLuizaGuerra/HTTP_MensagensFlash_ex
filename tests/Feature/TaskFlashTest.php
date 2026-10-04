<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskFlashTest extends TestCase
{
    use RefreshDatabase;

    public function test_visitante_e_redirecionado_para_login(): void
    {
        $this->get('/tasks')->assertRedirect('/login');
    }

    public function test_login_valido_exibe_flash_de_sucesso(): void
    {
        $user = User::factory()->create();

        $this->post('/login', ['email' => $user->email, 'password' => 'password'])
            ->assertRedirect('/tasks')
            ->assertSessionHas('success');

        $this->assertAuthenticatedAs($user);
    }

    public function test_login_invalido_exibe_flash_de_erro(): void
    {
        $this->post('/login', ['email' => 'x@x.com', 'password' => 'errada'])
            ->assertSessionHas('error');

        $this->assertGuest();
    }

    public function test_criar_tarefa_exibe_mensagem_flash(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/tasks', ['title' => 'Estudar sessões'])
            ->assertRedirect('/tasks')
            ->assertSessionHas('success', 'Tarefa criada!');

        $this->assertDatabaseHas('tasks', ['title' => 'Estudar sessões', 'user_id' => $user->id]);
    }

    public function test_remover_tarefa_exibe_flash_de_aviso(): void
    {
        $user = User::factory()->create();
        $task = $user->tasks()->create(['title' => 'Apagar']);

        $this->actingAs($user)
            ->delete("/tasks/{$task->id}")
            ->assertSessionHas('warning');

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function test_usuario_nao_acessa_tarefa_de_outro(): void
    {
        $dono = User::factory()->create();
        $outro = User::factory()->create();
        $task = $dono->tasks()->create(['title' => 'Privada']);

        $this->actingAs($outro)->get("/tasks/{$task->id}/edit")->assertNotFound();
    }

    public function test_logout_invalida_sessao_e_exibe_info(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post('/logout')
            ->assertRedirect('/login')
            ->assertSessionHas('info');

        $this->assertGuest();
    }
}
