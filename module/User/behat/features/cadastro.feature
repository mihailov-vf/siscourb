# language: pt
# Source: http://github.com/aslakhellesoy/cucumber/blob/master/examples/i18n/pt/features/adicao.feature
# Updated: Tue May 25 15:52:12 +0200 2010
Funcionalidade: Cadastro de usuário
  Para acessar todas as funcionalidades do sistema
  Como um novo usuário
  Eu quero me cadastrar

  Cenário: Acesso a página de cadastro
    Quando estou na página principal "/"
    E clico em "Cadastrar-se"
    Então devo ver "Cadastro de novo usuário"

  Cenário: Novo usuário por email
    Quando acesso a página de cadastro "/user/sign-up"
    E preencho o campo "User[name]"
    E preencho o campo "User[email]"
    E preencho o campo "User[password]"
    E preencho o campo "User[confirm_password]"
    E clico em "Confirmar cadastro"
    Então devo ver "Cadastro realizado com sucesso"
    E recebo um email de ativação de conta

  Cenário: Ativação de email
    Quando acesso a pagina de ativação "/user/activate/"
    E com o argumento ""
    E clico em "Confirmar email"
    Então devo ver "Conta ativada com sucesso"