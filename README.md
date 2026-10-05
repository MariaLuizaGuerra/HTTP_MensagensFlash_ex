**Projeto da disciplina de web 2 (IFPR, 2026), feito para o seminário Sessões HTTP e Mensagens Flash, por Maria Luiza e Julia.**
Tarefas: Sessões HTTP e Mensagens Flash

**O que é?**
Um app de lista de tarefas em Laravel que mostra, na prática, como funcionam as sessões HTTP e as mensagens flash: o usuário faz uma ação, é redirecionado e vê um aviso temporário que some sozinho e não volta ao recarregar a página.

**Funcionalidades:**
- Cadastro de usuário, que leva ao login com aviso de sucesso
- Login e logout, com mensagens de sucesso, erro e informação
- CRUD de tarefas (criar, editar, concluir, excluir), cada ação com sua mensagem flash
- Componente reutilizáveis, com os tipos success, error, warning e info
- Alertas que desaparecem sozinhos após 4 segundos
  
**Conceitos demonstrados:**

- Sessão: guarda dados entre várias requisições. O navegador envia só o ID, num cookie, e o servidor guarda os dados ( em storange/framework/sessions).
- Flash: dado temporário na sessão, que dura uma única requisição.
- session()->flash() e redirect()->with() fazem o mesmo trabalho.
- O ID da sessão é regenerado no login e no logout, por segurança.

**Como rodar:**

1. composer install / copy .env.example .env / php artisan key:generate

2. Configure o banco no .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD):

4. php artisan migrate:fresh --seed / php artisan serve 

Acesse http://127.0.0.1:8000.

Usuário de teste: 
email: fulano@exemplo.com /
senha: teste123

Estrutura principal
- AuthController: login, logout e cadastro
- TaskController: CRUD de tarefas
- resources/views/components/flash.blade.php: componente de alertas
- routes/web.php: rotas protegidas pelo middleware auth
