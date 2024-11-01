# Sylius Backoffice Plugin

The Backoffice plugin allows you to change back office color and channel logo.

![Presentation Photo](https://github.com/ayman-benmada/Sylius-Backoffice-Plugin/blob/main/src/Resources/public/presentation.png?raw=true)

## Installation

To install the plugin from this fork, follow these steps:

**Add a custom repository to your `composer.json`.** This instructs Composer to look for this fork in a GitHub repository.

> **Note:** This fork may get merged back into the main repo one day—so keep your fingers crossed! 🤞

```json
{
   "repositories": [
       {
           "type": "vcs",
           "url": "https://github.com/curler7/Sylius-Backoffice-Plugin"
       }
   ]
}
```

Once you have added the custom repository, you can require the plugin using Composer
```bash
composer require abenmada/sylius-backoffice-plugin
```

### Update the bundles configuration:
Add the Backoffice Plugin to your `config/bundles.php` file by including the following line.
```php
<?php

return [
    //..
    Abenmada\BackofficePlugin\BackofficePlugin::class => ['all' => true],
]
```

### Create the configuration file:
Create the configuration file at `config/packages/abenmada_backoffice_plugin.yaml` to import the necessary services for the back office plugin.
```yaml
imports:
    - { resource: "@BackofficePlugin/Resources/config/services.yaml" }
```

### Update the entity:
To update the `Channel` entity in `src/Entity/Channel/Channel.php` for compatibility with the back office plugin and to extend its functionality with the images feature, follow the instructions below.
```php
<?php

declare(strict_types=1);

namespace App\Entity\Channel;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Abenmada\BackofficePlugin\Model\Channel\ChannelTrait as AbenmadaBackofficeChannelTrait;
use Sylius\Component\Core\Model\Channel as BaseChannel;
use Sylius\Component\Core\Model\ImagesAwareInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_channel")
 */
class Channel extends BaseChannel implements ImagesAwareInterface
{
    use AbenmadaBackofficeChannelTrait;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        parent::__construct();
    }
}
```

### Run the migration:
You have two migration versions available: [Version20220803192855 for MySQL](src/Migrations/Version20220803192855.php) and [Version20241101104421 for Postgres](src/Migrations/Version20241101104421.php). When you run the migration command, **Doctrine will automatically execute the appropriate version based on your database configuration**.
```bash
bin/console doctrine:migration:migrate
```

### Configure the parameter (optional):
If your channel entity class differs from the default, you need to set the `abenmada.backoffice.channel_class` parameter in your `config/services.yaml`, or you can set the `ABENMADA_BACKOFFICE_CHANNEL_CLASS` environment variable. This parameter specifies which class to use for the channel entity.
```yaml
parameters:
  abenmada.backoffice.channel_class: '%env(ABENMADA_BACKOFFICE_CHANNEL_CLASS)|App\Entity\Channel\Channel%'  # Default
```
> **Note:** If you are using the default namespace, this step can be skipped.

### Clear the cache:
After making changes to your configuration or service definitions, it’s important to clear the cache to ensure that your application picks up the new settings. You can do this by running the following command in your terminal.
```bash
php bin/console cache:clear
```