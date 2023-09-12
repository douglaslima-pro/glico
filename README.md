# Glico
Glico é uma aplicação web para registro e monitoramento de dados de controle glicêmico para pessoas com **Diabetes**.

> Dentro do site a pessoa poderá inserir o valor da glicemia, seja no momento do acesso ou um valor referente a uma data e hora passada.

Além disso, o sistema irá gerar relatórios e visualizações automáticas de controle de glicemia, mostrando se o usuário está dentro da meta de controle, bem como, será possível visualizar dados importantes como: `média glicêmica, quantidade de hiperglicemias, quantidade de hipoglicemias e hemoglobina glicada`.

> [!IMPORTANT]
> O objetivo principal do projeto é desenvolver uma plataforma online que permita visualizar parâmetros de controle da Diabetes e também auxilie aqueles que realizam contagem de carboidratos.

## ⚙ Funções a serem desenvolvidas
Abaixo eu listo as principais funções a serem desenvolvidas nesse projeto:

- [ ] Registrar valor de glicemia
> Permite inserir o valor da glicemia do momento atual ou do passado com dia-horas.
- [ ] Visualizar controle diário
> Fornece uma visualização em tabela, organizada em dia-horas e também mostra a média de controle do dia.
>
> **Exemplo**
> |dia       | 0h | 1h | 2h | 3h | 4h | 5h | 6h | 7h | 8h | 9h | 10h | 11h | 12h | 13h | 14h | 15h | 16h | 17h | 18h | 19h | 20h | 21h | 22h | 23h | média |
> |----------|----|----|----|----|----|----|----|----|----|----|-----|-----|-----|-----|-----|-----|-----|-----|-----|-----|-----|-----|-----|-----|-------|
> |01/09/2023| -  | -  | -  | -  | -  | -  |115 | -  |85  | -  | -   | -   |165  | -   |153  | -   | -   | -   | -   |123  | -   | -   |130  | -   |128,5  |
> |02/09/2023| -  | -  | -  | -  | -  | -  |154 | -  |90  | -  | -   | -   |103  | -   |71   | -   | -   | -   | -   |143  | -   | -   |121  | -   |95,5   |
- [ ] Visualizar gráfico de controle (em dias)
> Fornece uma visualização em gráfico do controle em um período de dias, indicando a porcentagem de glicemias dentro da meta e fora da meta, além de indicar outros parâmetros importantes.
- [ ] Visualizar gráfico de controle (em horas)
> Fornece uma visualização de gráfico para mostrar os valores de glicemia organizados em cada horário. Assim o usuário pode ter noção dos momentos do dia em que está enfrentando maiores dificuldades no tratamento.
- [ ] Exportar relatório
> O usuário deve ser capaz de exportar os relatórios para arquivo PDF ou XML. Assim ele pode guardar os resultados que são úteis para o tratamento.

## 🔧 Ferramentas e Linguagens
**Ferramentas**
- **Visual Studio Code**: IDE para codificação
- **brModelo**: modelagem do banco de dados
- **Astah UML**: diagramas de caso de uso e diagramas de classes
- **Figma**: criação de interfaces
- **Word**: documentação

**Linguagens**
- **HTML**: front-end, marcação
- **CSS**: front-end, estilização
- **JavaScript**: front-end, telas interativas
- **PHP**: back-end, conexão com banco
- **Python**: back-end, geração de relatórios e análise de dados

> [!NOTE]
> O banco de dados (SGDB) escolhido é o MySQL.

## ➕ Informações adicionais
- O projeto está sendo desenvolvido apenas por mim ([Douglas](https://github.com/douglaslima-pro/))
- Tudo será documentado (literalmente)
- A arquitetura de software escolhida é a MVC (Model-View-Controller)

```
"If you can't explain it simply, you don't understand it well enough."
Albert Einstein
```
`Quanto menor, melhor!` O objetivo é demonstrar as minhas habilidades com desenvolvimento sem fugir do escopo do projeto!
