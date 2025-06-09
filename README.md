# PLUS User Management Portal

> Sistema desenvolvido para gerenciar usuários e integrações.

---

## Visão Geral

O PLUS User Management Portal é uma aplicação web que permite o cadastro, aprovação e gestão de usuários, associando-os a empresas específicas e controlando permissões com base em funções (RBAC). Além disso, o portal gera requisições JSON compatíveis com a API da OCI para criação de usuários, grupos e políticas, facilitando a integração com a infraestrutura Oracle Cloud.

---

## Funcionalidades Principais

- Registro e aprovação de usuários via painel administrativo.
- Interface limpa, responsiva e intuitiva.
- Dashboard personalizado conforme perfil do usuário.
- Indicadores de status para aprovações pendentes e requisições em execução.
- Gestão completa de empresas e associação de usuários.
- Geração e envio de requisições JSON compatíveis com OCI.
- Logs de requisições e ações dos usuários para auditoria.
- Controle de acesso baseado em funções (RBAC):
  - **Administrador**: acesso total, gestão de usuários e empresas.
  - **Gerente**: gerencia usuários dentro da empresa designada.
  - **Operador**: pode enviar requisições JSON, sem privilégios administrativos e gerenciais.

---

## Especificações Técnicas

### Estrutura de Dados

- Tabelas para usuários, permissões, funções (roles) e empresas.
- Armazenamento de detalhes de login, perfil e associação empresa-usuário.
- Tabelas para armazenar formatos JSON usados na integração com OCI.
- Registros de logs de ações e requisições enviadas.

### Integração com OCI

- Requisições JSON geradas com os seguintes exemplos:

```json
// Criar Usuário
{
  "compartmentId": "ocid1.tenancy.oc1.maisinteligencia.infrastructure",
  "name": "newuser@dominio-user.com",
  "description": "Usuário para acesso à plataforma web"
}
