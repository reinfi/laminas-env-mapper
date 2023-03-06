# Laminas Env Mapper
Using EnvMapper to map $_ENV to objects.

1. [Installation](#installation)
2. [Environment Object Mapping](#environment-object-mapping)
3. [FAQ](#faq)

### Installation

1. Install with Composer: `composer require reinfi/laminas-env-mapper`.

### Environment Object Mapping

Just specify the factory for your object, this will then map the object with EnvMapper.

```php
'service_manager' => [
    'factories' => [
        YourEnvironmentObject::class => \Reinfi\LaminasEnvMapper\Factory\EnvObjectMapperFactory::class,
    ],
]
```

You could use the object in your container by retrieving it.

```php
$container->get(YourEnvironmentObject::class);
```

#### Abstract Factory Usage

If you do not want to register all your environment objects to the container you could register
an abstract factory. 

```php
'service_manager' => [
    'abstract_factories' => [
        \Reinfi\LaminasEnvMapper\AbstractFactory\\Reinfi\LaminasEnvMapper\AbstractFactory\AbstractEnvObjectMapperFactory::class,
    ],
]
```

Your objects must extend the `EnvObjectInterface`.

### FAQ
Feel free to ask any questions or open own pull requests.
