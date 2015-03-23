#language: pt
Funcionalidade: Cadastro de necessidades
  Como um usuário Administrador
  Quero registrar novas necessidades (Problemas ou melhorias)
  Para os usuários utilizarem nos seu chamados

  @wip
  Cenário: Cadastrar nova Categoria de necessidades
    Dado que o Administrador está logado
    E acessa a página de cadastro de nova categoria
    Quando preenche o campo "Nome" 
    E preenche o campo "Descrição"
    E "Confirmar cadastro"
    Então registrar nova Categoria 

  @wip
  Cenário: Cadastrar nova Necessidade
    Dado que o Administrador está logado 
    E acessa a página de cadastro de nova necessidade
    Quando seleciona uma "Categoria"
    E preenche o campo "Nome" 
    E preenche o campo "Descrição"
    E "Confirmar cadastro"
    Então registrar nova Necessidade
