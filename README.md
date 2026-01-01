# Final Project - PHP

Descrição curta
Projeto final do curso que demonstra conhecimentos em PHP e MySQL: autenticação básica, operações CRUD e integração entre front-end (HTML/CSS/Bootstrap) e back-end (PHP).

Estado: Projeto académico / demonstração

Tecnologias
- PHP 7.4+
- MySQL / MariaDB
- HTML5, CSS3, JavaScript (vanilla)
- (Opcional) Bootstrap 4/5

Requisitos
- PHP 7.4+ (extensão PDO recomendada)
- MySQL 5.7+ (ou MariaDB)
- XAMPP / MAMP / LAMP / Docker

Instalação e execução local
1. Clona o repositório:
   git clone https://github.com/Rui-Silva-code/Final-Project-PHP.git
2. Copia o ficheiro de configuração de exemplo e edita:
   cp config.example.php config.php
   (preenche as credenciais locais)
3. Importa o esquema de exemplo:
   mysql -u teu_user -p nome_da_bd < sql/example_db.sql
4. Corre o servidor local:
   php -S localhost:8000
   Abre http://localhost:8000

Funcionalidades implementadas
- Login / logout simples (sessões PHP)
- CRUD de [entidade] (ex.: produtos, posts)
- Validação básica no front-end (JS) e back-end (PHP)
- Layout responsivo com Bootstrap

Limitações conhecidas
- Sem hashing avançado de passwords em versões antigas — recomenda-se password_hash()
- Sem recuperação de password / sem envio de e-mail
- Sem testes automatizados

Segurança / boas práticas
- Não comitar config.php com credenciais. Usa config.example.php.
- Se já comitaste credenciais, rotaciona as passwords e limpa o histórico.

Estrutura (resumo)
- index.php
- config.example.php
- /sql/example_db.sql
- /assets/ (CSS, JS, imagens)
- /app/ ou /src/ (lógica PHP)

Próximos passos sugeridos
- Implementar password_hash + prepared statements (se não houver)
- Mover credenciais para variáveis de ambiente
- Adicionar CI e testes básicos

Licença
MIT — ver LICENSE

Contacto
Rui Silva — https://github.com/Rui-Silva-code
