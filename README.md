# Gerenciador-de-Corridas
**README**

**Justificativa para o uso de frameworks ou bibliotecas (caso sejam usadas):**

Neste desafio, optamos por não utilizar frameworks ou bibliotecas externas além das necessárias para a linguagem PHP. O objetivo foi manter a solução o mais simples possível e demonstrar habilidades de programação sem depender de recursos externos.

**Explicação sobre as decisões técnicas e arquiteturais do seu desafio:**

O desafio foi resolvido utilizando PHP para o backend e HTML com JavaScript para o frontend. Foi adotada uma abordagem orientada a objetos, onde foram criadas três classes principais: `GerenciadorCorridas`, `Corrida` e um script para cancelamento de corridas (`cancelar_corrida.php`).

- `GerenciadorCorridas`: Responsável por gerenciar as corridas. Possui métodos para criar e listar corridas.

- `Corrida`: Representa uma corrida no sistema. Possui propriedades como ID, usuário e status.

- `cancelar_corrida.php`: Script para cancelar uma corrida específica e atualizar as informações na sessão.

A sessão foi utilizada para armazenar as informações das corridas, como uma forma simples de persistência de dados em memória.

O frontend consiste em uma página HTML que exibe as corridas em uma tabela e permite cancelar corridas via JavaScript. O feedback do cancelamento é imediato, pois a tabela é atualizada dinamicamente após o cancelamento.

**Instruções sobre como compilar e executar o projeto:**

1. Certifique-se de ter um servidor web com PHP instalado.
2. Faça o download dos arquivos fornecidos e coloque-os em um diretório acessível pelo servidor.
3. No terminal, navegue até o diretório onde os arquivos estão localizados.
4. Inicie o servidor web, por exemplo, utilizando o comando `php -S localhost:8000`.
5. Abra um navegador web e acesse `http://localhost:8000/index.php`.
6. Você verá a lista de corridas ativas. Clique no botão "Cancelar" para cancelar uma corrida.

**Notas adicionais que você considere importantes para a avaliação:**

- O código foi desenvolvido com foco em simplicidade, legibilidade e funcionalidade.
- Foram implementadas verificações de segurança básicas para garantir que o script de cancelamento de corridas funcione corretamente apenas se todas as condições necessárias forem atendidas.
- A solução foi testada localmente para garantir seu funcionamento adequado.

Se houver mais alguma dúvida ou se precisar de mais alguma informação, estou à disposição para ajudar!
