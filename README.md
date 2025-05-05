## Documentação da API

#### Retorna todos os itens

```http
  POST /api/entrega
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `cliente` | `string` | Nome do cliente que recebe a entrega |
| `cep`     |  `string`| Cep do cliente |
| `produtos`| `List`   | Uma lista com o nome dos produtos |
| `endereco`| `string` | O endereço do cliente com rua, numero, bairro, complemento|

#### Vincular Entrega a um motoboy

```http
  POST /api/vincular
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `entrega_id`      | `int` | Id da entrega |
| `motoboy_id`       | `int` | Id do motoboy |