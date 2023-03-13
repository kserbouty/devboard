# Devboard

Kanban board for task management.

Digital whiteboard to help visualize the process of a project by adding tasks represented as post-it. Made to
manage several projects within an account and provide the option to sort tasks by priority.

### Technologies

- Symfony 5.4
- PHP 8.0
- MariaDB 10.6
- Twig 3.5
- Bootstrap 5.2
- Apache 2.4

### Roadmap

&check; - Create an account.

&cross; - Log into the application. 

&cross; - Add settings for an account.

&cross; - Create a workspace.

&cross; - Manage workspaces by category.

&cross; - Create a task.

&cross; - Manage tasks by priority.

## Installation

### Requirements

- PHP 8.0+
- MySQL 8.0+
- Composer 2.5+

### Manual installation

Clone the repository :

```bash
git clone https://github.com/kserbouty/devboard.git
```

Switch to the repository folder :

```bash
cd devboard
```

Install all the dependencies with composer :

```bash
composer install
```

Replace database username and password in the .env file :

> DATABASE_URL="mysql://username:password@127.0.0.1:3306/devboard?serverVersion=8.0&charset=utf8"

Start a local server :

```bash
php -S localhost:8000 -t public
```

Public folder available on <http://localhost:8000>.

## License

[MIT](LICENSE.md)

## Project status

*In Development*
