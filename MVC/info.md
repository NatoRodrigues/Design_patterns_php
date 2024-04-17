#mvc php

#padrão de projeto

#mvc
#-Model-> Trabalhará com o bancco de dados
#-Views-> Templates, tudo aquilo que o usuario vê na Tela
#-Controller-> gerencia ambos. Toda a lógica do back será em cima do controller

#exemplo:
#observe a seguinte URL:
#https://devclass.com.br/curso/edit/12 
na URL acima  temos:

#->controller = curso
#->método = Edit
#->parametro dado para ser deletado (no caso o ID) = 12


#https://devclass.com.br/curso/destroy/12
na URL acima temos:

#->controller = curso
#->método = destroy
#->parametro dado para ser editado (no caso o ID) = 12

#Principais metodos criados dentro dos controllers:

#index - Quando o controller é carregado mas nenhum método é passado

#show - Quando se quer pegar um registro especifico

#edit - mostrar o formulário para atualizar algum registro

#update - atualizar registro do banco

#create - Mostrar o form para cadastrar algum registro
#O create assim como o Edit, vai exibir um form só que o edit mostra um form para atualização, já o que create exibe o form para a inserção (criação) de um registro

#store -  serve pra cadastrar, realizar a ação no banco.

#destroy - vem como parametro, ele serve para  realizar LOGOUT ou quando for necessário deletar algum registro no banco de dados

#-----------IMPORTANTE-----------

#create != store