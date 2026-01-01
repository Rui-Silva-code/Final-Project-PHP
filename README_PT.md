# CRUD-AUTHENTICATION – PHP & MySQL

## Visão geral
Projeto final desenvolvido no âmbito do curso de Web Development, com o objetivo de demonstrar competências práticas em desenvolvimento back-end com **PHP** e **MySQL**, bem como a integração com o front-end.

O projeto inclui **autenticação de utilizadores**, **operações CRUD** e uma estrutura básica organizada seguindo boas práticas iniciais.

**Estado:** Projeto académico / demonstração técnica

---

## O que este projeto demonstra
- Desenvolvimento back-end com PHP (programação procedural / organizada)
- Integração PHP + MySQL através de **PDO**
- Implementação de autenticação básica com sessões
- Operações CRUD completas
- Validação de dados no front-end e no back-end
- Estruturação de um pequeno projeto full-stack
- Boas práticas básicas de segurança e organização de código

---

## Tecnologias utilizadas
- PHP 7.4+
- MySQL / MariaDB
- HTML5, CSS3
- JavaScript (vanilla)
- Bootstrap 4/5

---

## Funcionalidades implementadas
- Login e logout de utilizadores (sessões PHP)
- CRUD de entidades (ex.: utilizadores / produtos / posts)
- Validação básica de formulários (JavaScript e PHP)
- Layout responsivo com Bootstrap
- Separação básica entre lógica, apresentação e configuração

---

## Requisitos
- PHP 7.4+ (extensão **PDO** recomendada)
- MySQL 5.7+ ou MariaDB
- Ambiente local (XAMPP / MAMP / LAMP / Docker)

---

## Instalação e execução local
1. Clonar o repositório:
   ```bash
   git clone https://github.com/Rui-Silva-code/Final-Project-PHP.git
2. Criar o ficheiro de configuração:
   ````bash
   cp config.example.php config.php
3. Importar a base de dados de exemplo:
   ````bash
   mysql -u teu_user -p nome_da_bd < sql/example_db.sql
4. Iniciar o servidor local:
   ````bash
   php -S localhost:8000
5. Abrir no browser:
   ````bash
   http://localhost:8000

---

Estrutura do projeto (resumo)
      /css/                    -> Estilos
      /imagens/                -> Imagens
      casopratico.sql          -> Esquema da base de dados
      basedados.php            -> Ligação à base de dados
      index.php                -> Página inicial
      login.php                -> Página de login
      processa_login.php       -> Processamento do login
      pagina_de_registro.html  -> Página de registo
      processa_registro.php    -> Processamento de registo
      perfil_utilizador.php    -> Perfil do utilizador
      perfil_admin.php         -> Perfil do administrador
      editar_*.php             -> Operações de edição
      excluir_*.php            -> Operações de eliminação


---

Limitações conhecidas

   - Projeto sem testes automatizados
   - Não inclui recuperação de password ou envio de e-mails
   - Algumas funcionalidades de segurança podem ser aprofundadas

---

Segurança e boas práticas

   - Credenciais sensíveis não são comitadas no repositório
   - Uso de ficheiro de configuração de exemplo (config.example.php)
   - Separação entre código e dados sensíveis
   - Preparado para evolução para password_hash() e melhorias de segurança

---

Próximos passos / melhorias futuras

   - Implementar password_hash() e password_verify()
   - Reforçar uso de prepared statements
   - Mover credenciais para variáveis de ambiente
   - Adicionar testes básicos
   - Melhorar organização do código (MVC simples)

---

Autor

Rui Silva
GitHub: https://github.com/Rui-Silva-code
