ContactBook
===========

Do not use/watch ... it's WIP !

To install


```
composer install --dev
bin/doctrine orm:schema-tool:create (look at config/bootstrap to replace mysql informations)
```

Roadmap
-------

- Retrieve a view
- Priority system in listeners
- Create version transaction system.
- Handle pre/post event ? (without storing new version)
- Use Registry of doctrine instead of ORM\EntityManager to be compliant with ODM, etc...

- Map all models in doctrine
- Create command
- Create listeners
- ElasticSearch integration ?
- Store versions in a MYSQL table ?
- ...

see `@todo` in the code.
