## Documentação da API

#### Endpoint para cadastrar entrega

```http
  POST /api/entrega
```

| Header   | Tipo       | Obrigatório | Descrição                           |
| :---------- | :--------- | :---------- | :---------------------------------- |
| `Authorization` | `string` | Sim | Token de acesso recebi na tela inicial |

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `cliente`               | `string` | Nome do cliente que recebe a entrega |
| `cep`                   |  `string`| Cep do cliente |
| `conteudo_entrega`      | `string`   | Uma lista com o nome dos produtos |
| `rua`                   | `string` | A rua da entrega
| `bairro`                | `string` | O bairro da entrega |
| `codigo_pedido`         | `integer`| O código do pedido no seu sistema |
