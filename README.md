<h1>Backoffice plugin</h1>

<p>
    The Backoffice plugin allows you to change back office color and channel logo
</p>

<img sr

## Installation

Add in `composer.json`

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "plugin/BackofficePlugin",
            "options": {
                "symlink": true
            }
        }
    ],
    "require": {
        "abenmada/backoffice-plugin": "@dev"
    }
}
```

Change your `config/bundles.php` file to add the line for the plugin :

```php
<?php

return [
    //..
    Abenmada\BackofficePlugin\BackofficePlugin::class => ['all' => true],
]
```

Then create the config file in `config/packages/abenmada_backoffice_plugin.yaml` :

```yaml
imports:
    - { resource: "@BackofficePlugin/Resources/config/services.yaml" }
```

Update the entity `src/Entity/Channel/Channel.php` :

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
