# language: pt
Funcionalidade: Cadastro de usuários
  Como um usuário visitante
  Quero me cadastrar no sistema
  Para ter acesso as todas as funcionalidades do sistema

  @wip
  Cenário: Novo usuário por email
    Dado um visitante não registrado como usuário
    E acessa a página de cadastro
    Quando preenche os campos nome
    E email
    E senha
    E redigite_senha
    Então registrar usuário como pendente
    E enviar email de ativação de conta

  @wip
  Cenário: Confirmação de ativação
    Dado um usuário recém registrado
    Quando acessa a página de ativação
    E envia os dados de confirmação
    Então ativar o usuário
    E enviar email de boas vindas

  @wip
  Cenário: Novo usuário autenticação externa
    Dado um visitante não registrado como usuário
    E acessa a página de cadastro por autenticação externa
    Quando confirmado a aprovação do autenticador
    Então criar um novo usuário com os dados recolhidos do autenticador
    E enviar email de boas vindas