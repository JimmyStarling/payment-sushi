# payment-sushi

Sistema de pagamentos para um serviço de delivery de sushi. Este projeto é um microsserviço construído com Laravel, aplicando os princípios da **arquitetura hexagonal** para garantir desacoplamento entre regras de negócio, interfaces externas e infraestrutura.

---

## Objetivo

Gerenciar e processar pagamentos de pedidos realizados via plataforma de delivery. Integra-se com gateways como Stripe e Pix, permitindo a extensão para novos métodos de pagamento de forma isolada e testável.

---

## Arquitetura

Este projeto adota a **Arquitetura Hexagonal (Ports and Adapters)**, também conhecida como **Arquitetura de Cebola** ou **Arquitetura Limpa**.

- **Domínio (Core)**: onde ficam as regras de negócio puras e entidades.
- **Aplicação (Use Cases)**: coordena as operações com base em regras do domínio.
- **Portas (Ports)**: interfaces para comunicação com o domínio.
- **Adaptadores (Adapters)**: implementações concretas de gateways de pagamento, controladores HTTP, filas, etc.
- **Infraestrutura**: onde vivem as dependências externas como Laravel, banco de dados, filas, etc.

---

## Tecnologias Utilizadas

- PHP 8.2+
- Laravel 11
- MySQL / PostgreSQL
- Stripe API (pagamentos com cartão)
- Pix (via API de instituição financeira)
- Redis (opcional para filas)
- Docker (ambiente dev)


