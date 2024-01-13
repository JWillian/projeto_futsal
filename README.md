# Sobre o projeto

O projeto de Gestão de Campeonato de Futsal é uma aplicação para gerenciar jogadores, times, partidas e campeonatos de fotebol. 

# Tecnologias utilizadas
## Back end
- PHP
- Laravel
- Postman
- Mysql
- Composer
- NPM

 # Host
  - Aplicação local via Xampp

## Funcionalidades Principais

- Cadastro de times, jogadores, partidas e Campeonatos.
- Autenticação de usuários para garantir segurança e controle de acesso dos dados enviados nas requisições. 
- Autenticação de todas as rotas atraves do autenticador de api JWT.

## Rotas das Requisições das Tabelas

![image](https://github.com/JWillian/projeto_futsal/assets/19697488/cc024952-748f-4b1f-a4ea-2db1fd424f8e)

## Rotas do Login do user para acessar o Token da autenticação JWT

![image](https://github.com/JWillian/projeto_futsal/assets/19697488/6b8d25e9-794a-4491-ac0d-188ea1ecacc1)


## Instruções para acesso das rotas 

- Rodar comando php artisan tinker
- Rodar comando User::factory()->create() para criar usuario com senha.
- Pegar o Email do Usuario / exemplo  ( email: "lbrakus@example.org")
- Ir no postman e colocar o metodo Post
- Colocar Rota -> http://127.0.0.1:8000/api/login
- Inserir no Body os campos:
   {
   "email": "email copiado",
   "password": "password"
    }
-Ir em em autorizathion e selecionar inherit auth from parent.
- Fazer a requisição clicando em send e copiar o TOKEN gerado no retorno da requisição.
- colocar a rota desejada (end-point)  e colocar em HEADERS as opções:
  key: Authorization
  value: bearer + o token copiado [Token]
  
  [ OBS: os tokens tem limite de tempo. é preciso sempre gerar um token para obter os dados da requisição desejada. ]

  ## Rotas

 Login

     Route::post('register', [AuthController::class, 'register']); // Registro 
     Route::post('login', [AuthController::class, 'login']); // Faz login e Gera o Token.

 Tabelas Crud
 
    Route::get('/jogadores', [JogadoresController::class, 'index']);   // Home jogadores.
    Route::post('/jogadores',[JogadoresController::class, 'store']);  // Insere o Jogador.
    Route::get('/jogadores/{id}',[JogadoresController::class, 'show']);  // Exibe o jogador.
    Route::put('/jogadores/update/{id}', [JogadoresController::class, 'update']); // Atualiza os dados do Jogador.
    Route::delete('/jogadores/delete/{id}', [JogadoresController::class, 'destroy']); // exclui o jogador.  

    Route::get('/times',[TimeController::class, 'index']);   // Home times.
    Route::post('/times',[TimeController::class, 'store']);  // Insere o time.
    Route::get('/times/{id}',[TimeController::class, 'show']);  // Exibe o time.
    Route::put('/times/update/{id}', [TimeController::class, 'update']); // Atualiza os dados do time.
    Route::delete('/times/delete/{id}', [JogadoresController::class, 'destroy']); // exclui o time.

    Route::get('/partidas',[PartidaController::class, 'index']);   // Home partidas.
    Route::post('/partidas',[PartidaController::class, 'store']);  // Insere a partida.
    Route::get('/partidas/{id}',[PartidaController::class, 'show']);  // Exibe a partida.
    Route::put('/partidas/update/{id}', [PartidaController::class, 'update']); // Atualiza a partida.
    Route::delete('/partidas/delete/{id}', [PartidaController::class, 'destroy']); // exclui a partida.

    Route::get('/classificacao',[ClassificacaoController::class, 'index']);   // Home classificação.
    Route::post('/classificacao',[ClassificacaoController::class, 'store']);  // Insere a classificação.
    Route::get('/classificacao/{id}',[ClassificacaoController::class, 'show']);  // Exibe a classificação.
    Route::put('/classificacao/update/{id}', [ClassificacaoController::class, 'update']); // Atualiza a classificação.
    Route::delete('/classificacao/delete/{id}', [ClassificacaoController::class, 'destroy']); // exclui a classificação.


## Pré-requisitos

- PHP (versão 8 ou superior)
- Laravel (versão 9 ou superior)
- Composer
- Banco de dados MySQL
- Node.js e NPM (para compilar os assets)
- Postman para testar as requisições (end-point)
- Xampp ou Wamp

# clonar repositório
Chave SSH - git@github.com:JWillian/projeto_futsal.git

# Autor

Jonatas Willian Rodrigues Leite Isaac
(Isaac)

https://www.linkedin.com/in/jonatas-willian-059923b7/

