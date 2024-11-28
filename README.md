# Descrição
===========

Gostaríamos que você criasse um aplicativo de coleção de músicas muito básico. Isso é apenas para verificar suas habilidades em OOP, organização geral de código e experiência em arquitetura de software. Aplique padrões básicos de UX à interface do usuário, não se preocupe com o design.

O aplicativo deve ser simples, não há necessidade de criar uma página de registro nem outros recursos de gerenciamento de usuários. Para armazenamento de dados, fique à vontade para usar qualquer banco de dados relacional desejado.

Quando terminar, envie-nos o link para um repositório público (atualmente usamos o gitlab) com o aplicativo. Uma versão implantada que poderíamos testar é um bônus.

Se você planeja usar uma estrutura (se não estiver, deve :)), confirme primeiro o código da estrutura e suas alterações posteriormente em confirmações separadas. Isso é para que possamos identificar claramente seu código / alterações. Não rebase seu código com a confirmação inicial quando você estiver pressionando o código da estrutura, ou será mais difícil ver apenas o seu código.

Sinta-se à vontade para apresentar qualquer requisito omitido na especificação abaixo (por exemplo: mensagens de erro, fluxos de usuários, etc.). Lembre-se de que não estamos buscando detalhes completos nem design. Você não precisa gastar mais do que algumas horas nessa tarefa; se estiver, está fazendo mais do que estamos pedindo :)

# Exigências
============

* Conecte-se 

Crie uma página de login básica com os campos *username* e *password*
Uma vez logado, o usuário poderá acessar todas as páginas internas do aplicativo de música
Se um usuário não conectado tentar acessar qualquer página interna, ele deverá ser redirecionado para a página de login

Após um login bem-sucedido, o usuário deve ser redirecionado para a *Artists list* página
Uma tentativa de login com falha enviará o usuário de volta à página de login com o erro: *Sorry, we couldn't find an account with this username. Please check you're using the right username and try again.*

* Artistas

Crie 3 páginas que permitirão aos usuários listar, adicionar e editar artistas.
Cada artista conterá os seguintes campos:

- *Artist name*
- *Twitter handle*

* Álbuns

Crie 3 páginas que permitirão aos usuários listar, adicionar e editar álbuns.
Cada álbum conterá os seguintes campos:

- *Artist* permitir que o usuário selecione na lista de artistas existentes
- *Album name*
- *Year*
