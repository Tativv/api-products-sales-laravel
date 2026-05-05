# 🛒 API de Produtos e Vendas - Laravel

## Descrição

API REST desenvolvida em Laravel para gerenciamento de produtos, autenticação de usuários e controle de vendas com atualização automática de estoque.

---
## 🚀 Funcionalidades

🔐 Autenticação com Laravel Sanctum

📦 CRUD de produtos

💰 Sistema de vendas

📊 Controle automático de estoque

✅ Validação de dados

🔒 Proteção de rotas com middleware

---
## 🛠️ Tecnologias

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white)
![Sanctum](https://img.shields.io/badge/Laravel_Sanctum-00ADD8?style=for-the-badge&logo=laravel&logoColor=white)

---
## ▶️ Instalação

**1. Instalar dependências**

```bash
composer install
```

**2. Configurar ambiente**

```bash
cp .env.example .env
php artisan key:generate
```

**3. Rodar banco de dados**

```bash
php artisan migrate
```

**4. Iniciar servidor**

```bash
php artisan serve
```

---
## 🔐 Autenticação

A API utiliza autenticação baseada em token com Laravel Sanctum.

### Login

**Endpoint:**

```bash
POST /api/login
```

**Request:**

```json
{
  "email": "test@test.com",
  "password": "123456"
}
```

**Response:**

```json
{
  "token": "seu_token_aqui"
}
```

---

### 🔑 Uso do Token

Para acessar rotas protegidas, envie o token no header:

```bash
Authorization: Bearer seu_token_aqui
```

---

### ⚠️ Importante

* O token deve ser incluído em todas as requisições protegidas
* Caso não seja enviado, a API retornará:

```json
{
  "message": "Unauthenticated."
}
```

---
## 📦 Endpoints principais

### Produtos

GET /api/products

POST /api/products

PUT /api/products/{id}

DELETE /api/products/{id}

### Vendas

POST /api/sales

GET /api/sales

---
## Lógica de negócio

- Validação de estoque antes de realizar a venda
- Desconto automático do estoque
- Cálculo automático do total da venda
- Relacionamento entre produtos e vendas

---
👩‍💻 Autora

Tatiana


