# language: pt
Funcionalidade: Cadastro de Entidades
  Como um Gestor de uma Entidade
  Quero registrar minha Entidade no sistema
  Para ter acesso fácil aos chamados direcionados a ela

  @wip
  Cenário: Nova Entidade
    Dado um usuário devidamente registrado
    Quando acessa o cadastro de Entidades
    E escolhe opção de nova entidade
    E preenche os campos Nome
    E Endereço
    E Telefone
    E Email de contato ao público
    E Tipo de atividade (Empresa ou Órgão público)
    Então registrar Entidade como pendente
    E enviar email de confirmação para o Admin
    E enviar email de boas vindas para o usuário

  @wip
  Cenário: Novo Gestor de Entidade existente sem Gestor
    Dado um usuário devidamente registrado
    Quando acessa o cadastro de Entidades
    E escolhe opção de Entidade existente
    E seleciona uma entidade
    E preenche os campos Nome
    E Endereço
    E Telefone
    E Email de contato ao público
    E Tipo de atividade (Empresa ou Órgão público)
    Então enviar email de confirmação para o Admin
    E enviar email de boas vindas para o usuário