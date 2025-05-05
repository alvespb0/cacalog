## Documentação da API

#### Endpoint para cadastrar entrega

```http
  POST /api/entrega
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `cliente` | `string` | Nome do cliente que recebe a entrega |
| `cep`     |  `string`| Cep do cliente |
| `produtos`| `List`   | Uma lista com o nome dos produtos |
| `endereco`| `string` | O endereço do cliente com rua, numero, bairro, complemento