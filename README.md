# Invoke Toolkit Resources

Invoke toolkit resources extension.

## Details

The extension allows to automatically create default methods for CRUD operations.

You only need to specify Input, Result types and repository for operations.

For instance, let's create `users` resource.

```php
class UserData extends Data
{
    public string $name;
}

class UserInput extends UserData
{
}

class UserResult extends UserData
{
    public int $id;
}

class UserRepository implements ResourceRepositoryInterface
{
    public function create(mixed $itemInput) : mixed {}
    
    public function updateById(mixed $id,mixed $itemInput) : mixed {}
    
    public function deleteById(mixed $id) : mixed {}
    
    public function getAll() : array {}
}

$usersResource = new Resource(
    name: 'users',
    repository: new UserRepository,
    input: UserInput::class,
    result: UserResult::class,
);

ResourcesManager::add($usersResource);
```

After adding the resource, the following methods will be automatically created:

```
users.create(user: UserInput): UserResult;
users.updateById(id: T, user: UserInput): UserResult;
users.deleteById(id: T): void;
users.getAll(): UserResult[];
```

## Installation

```shell
composer require storinka/invoke-toolkit-resources
```
