#language: pt 
Funcionalidade: Usuário acessando os registros de chamados
  Como um Usuário
  Quero abrir, visualizar, apoiar, comentar e fechar chamados de problemas ou melhorias
  Para melhor informar, criticar e apoiar as Entidades responsáveis pelos serviços públicos
  E garantir melhor atendimento das necessidades dos cidadãos

  @wip
  Cenário: Usuário visualizando chamados
    Dado um usuário acessando a página inicial
    E existem os chamados 1, 2 e 3
    Quando visitar a página de "Chamados"
    Então deve existir uma lista de chamados
    E deve-se ver "Chamado 1"
    E deve-se ver "Chamado 2"
    E deve-se ver "Chamado 3"

  Cenário: Usuário abrindo um chamado
    Dado um usuário logado
    E acessa o registro de chamados
    