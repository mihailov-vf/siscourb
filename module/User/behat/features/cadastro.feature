# language: pt
# Source: http://github.com/aslakhellesoy/cucumber/blob/master/examples/i18n/pt/features/adicao.feature
# Updated: Tue May 25 15:52:12 +0200 2010
Funcionalidade: Cadastro de usuário
  Para acessar todas as funcionalidades do sistema
  Como um novo usuário
  Eu quero me cadastrar

  Cenário: Acesso a página de cadastro
    Quando estou na página de entrada
    E sigo o link "Cadastrar-se"
    Então devo ver "Cadastro de novo usuário"

  Cenário: Novo usuário por email
    Quando Eu vou para "/user/sign-up"
    E preencho "User[name]" com "Joe"
    E preencho "User[email]" com "joe@joe.com"
    E preencho "User[password]" com "Joe"
    E preencho "User[confirm_password]" com "Joe"
    E pressiono "Confirmar cadastro"
    Então devo ver "Cadastro realizado com sucesso"

  Cenário: Ativação de email
    Quando vou para "/user/activate/"
    E pressiono "Confirmar email"
    Então devo ver "Conta ativada com sucesso"