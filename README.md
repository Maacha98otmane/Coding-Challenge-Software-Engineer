# Software Engineer - Coding challenge by Next Media

## Author

- [@Otmane Maacha](https://www.github.com/Maacha98otmane)


## Table of contents

- [Product definition](#product-definition)
- [Category definition](#category-definition)
- [Run Locally](#run-locally)
  - [Installation](#Installation)
- [Features](#features)
  - [Run Command](#cli-reference)
- [Run Tests](#testing)
- [Repository Layer](#eloquent-queries-in-the-repository-layer)
- [License](#license)

## Product definition

| field         | Type     | Description   |
| :------------ | :------- | :------------ |
| `name `       | `string` | **Required**. |
| `description` | `string` | **Required**. |
| `price`       | `float`  | **Required**. |
| `image`       | `string` | **Required**. |

## Category definition

| field             | Type            | Description   |
| :---------------- | :-------------- | :------------ |
| `name `           | `string`        | **Required**. |
| `parent_category` | `null/category` | **Optional**. |

## Run Locally

Clone the project

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd my-project
```

### Installation

Use the package manager [composer](https://getcomposer.org/) to install required files

Install dependencies

```bash
  composer install
```

Set the environment variables:

```bash
cp .env.example .env
# open .env and modify the environment variables (if needed)
```
```bash
php artisan key:generate
php artisan storage:link # to make images accessible to the public folder.
```

Start the server

```bash
  php artisan serve
```

## Features

### CLI Reference

### Category

#### Create

```bash
  php artisan create:category {name} {--parent=?} # Add category with parent category (Optional)

```

#### Delete

```bash
  php artisan delete:category {id}
```

### Product

#### Create

```bash
  php artisan create:product {name} {description} {price} {image} {--categories}
```

#### Delete

```bash
  php artisan delete:product {id}
```

## Testing

#### Product creation can be covered by automated tests

```bash
  php artisan test
```

## Eloquent queries in the repository layer

### Wrap Eloquent queries in the repository layer

```
app
├── Repository
│   ├── Category
├───────├── CategoryRepository.php
├───────├── EloquentRepository.php
│   ├── Product
├───────├── ProductRepository.php
├───────├── EloquentRepository.php

```


## License

[MIT](https://choosealicense.com/licenses/mit/)
