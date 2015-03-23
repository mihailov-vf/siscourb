# language: pt
Funcionalidade: Cadastro de Entidades
  Como um Gestor de uma Entidade
  Quero registrar minha Entidade no sistema
  Para ter acesso fácil aos chamados direcionados a ela

  @wip
  Cenário: Nova Entidade
    Dado um usuário logado
    E acessa a página de cadastro de Entidades
    Quando escolhe opção de criar "Nova entidade"
    E preenche o campo "Nome"
    E preenche o campo "Endereço"
    E preenche o campo "Telefone"
    E preenche o campo "Email" de contato ao público
    E preenche o campo "Tipo" de atividade (Empresa ou Órgão público)
    E "Confirmar cadastro"
    Então registrar Entidade como pendente
    E enviar email de confirmação para o Admin
    E enviar email de boas vindas para o usuário

  @wip
  Cenário: Novo Gestor de Entidade existente sem Gestor
    Dado um usuário logado
    E acessa a página de cadastro de Entidades
    Quando escolhe opção "Entidade existente"
    E preenche o campo "Nome"
    E preenche o campo "Endereço"
    E preenche o campo "Telefone"
    E preenche o campo "Email" de contato ao público
    E preenche o campo "Tipo" de atividade (Empresa ou Órgão público)
    E "Confirmar cadastro"
    Então enviar email de confirmação para o Admin
    E enviar email de boas vindas para o usuário
