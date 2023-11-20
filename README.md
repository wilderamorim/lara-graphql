# Laravel GraphQL

```sh
git clone -b master https://github.com/wilderamorim/lara-graphql.git lara-graphql
cd lara-graphql
cp .env.example .env
```

```dosini
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=lara_graphql
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

```sh
docker-compose up -d
docker-compose exec app bash
composer install
php artisan key:generate
```

[http://localhost:8989](http://localhost:8989)

# Documentation

### Fetch all categories

```graphql
query FetchCategories {
  categories {
    id
    name
  }
}
```

Or alternatively:

http://localhost:8989/graphql/category?query=query+FetchCategories{categories{id,name}}

### Fetch all categories with courses

```graphql
query FetchCategoriesWithCourses {
  categories {
    id
    name
    courses {
      id
      name
    }
  }
}
```

Or alternatively:

http://localhost:8989/graphql/category?query=query+FetchCategoriesWithCourses{categories{id,name,courses{id,name}}}

### Fetch a single category

```graphql
query FetchCategoryByID($id: Int)
{
    categories(id: $id) {
        id
        name
    }
}
```

```json
{
    "id": 1
}
```

Or alternatively:

http://localhost:8989/graphql/category?query=query+FetchCategoryByID($id:Int){categories(id:$id){id,name}}&variables={"id":1}

### Fetch categories that have courses

```graphql
query FetchCategoriesHasCourses {
  categories(hasCourses: true) {
    id
    name
  }
}
```

Or alternatively:

http://localhost:8989/graphql/category?query=query+FetchCategoriesHasCourses{categories(hasCourses:true){id,name}}

### Create a category

```graphql
mutation CreateCategory {
  createCategory(name: "Category 1") {
    id
    name
  }
}
```

Or alternatively:

[http://localhost:8989/graphql/category?query=mutation+CreateCategory{createCategory(name:"Category 1"){id,name}}](http://localhost:8989/graphql/category?query=mutation+CreateCategory{createCategory(name:"Category%201"){id,name}})

### Update a category

```graphql
mutation UpdateCategory {
  updateCategory(id: 1, name: "Category 1 Updated") {
    id
    name
  }
}
```

Or alternatively:

[http://localhost:8989/graphql/category?query=mutation+UpdateCategory{updateCategory(id:1,name:"Category 1 Updated"){id,name}}](http://localhost:8989/graphql/category?query=mutation+UpdateCategory{updateCategory(id:1,name:"Category%201%20Updated"){id,name}})

### Delete a category

```graphql
mutation DeleteCategory {
  deleteCategory(id: 1)
}
```

Or alternatively:

[http://localhost:8989/graphql/category?query=mutation+DeleteCategory{deleteCategory(id:1)}](http://localhost:8989/graphql/category?query=mutation+DeleteCategory{deleteCategory(id:1)})
