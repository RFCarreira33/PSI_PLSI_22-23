## Installation

```sh
    git clone https://github.com/RFCarreira33/PSI_PLSI_22-23.git
```

- Execute the database scripts which contain the structure and data respectively `projeto_final.sql` and `registos.sql`.

- In the home directory of the the app run

```sh
composer update
init
yii rbac/init
```

- Make any changes needed to the database connection file in `common\config\main-local.php`.

```php
    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost;dbname=projeto_final',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
        ],
```

### Default User Credentials

> Admin:
>
> - Username: admin
> - Password: admin123
>
> Worker:
>
> - Username: funcionario
> - Password: funcionario123
>
> Client:
>
> - Username: cliente
> - Password: cliente123

## Software Tests

- There are tests for backend and frontend and there is a config file for each layer.
- Make any changes needed to the config file in `\config\test-local.php`.
- Pick a layer to test and `cd` into it.
- Both type and filename can be ignored.
- But they can broken down to 3 groups (`type`) unit, functional and acceptance.

```sh
    ../vendor/bin/codecept run [type] [filename]
```

- To run the `acceptance` tests there is a need to install `Selenium-Standalone` and a `Webdriver` for [more information](https://codeception.com/docs/AcceptanceTests).
