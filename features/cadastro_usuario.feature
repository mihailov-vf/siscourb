# language: pt
Funcionalidade: Cadastro de usuários
  Como um usuário visitante
  Quero me cadastrar no sistema
  Para ter acesso as todas as funcionalidades do sistema

  @wip
  Cenário: Novo usuário por email
    Dado um visitante não registrado como usuário
    E acessa a página de cadastro
    Quando preenche o campo "Nome"
    E preenche o campo "Email"
    E preenche o campo "Senha"
    E preenche o campo "redigite_senha"
    E preenche o campo "Confirmar cadastro"
    Então registrar Usuário como pendente
    E enviar email de ativação de conta

  @wip
  Cenário: Confirmação de ativação
    Dado um usuário recém registrado
    Quando acessa a página de ativação
    E envia os dados de confirmação
    Então alterar o Usuário para "Ativo"
    E enviar email de boas vindas

  @wip
  Cenário: Novo usuário autenticação externa
    Dado um visitante não registrado como usuário
    E acessa a página de cadastro por autenticação externa
    Quando confirmado a aprovação do autenticador
    Então criar um novo usuário com os dados recolhidos do autenticador
    E enviar email de boas vindas