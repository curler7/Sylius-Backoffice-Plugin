<?php

declare(strict_types=1);

namespace App\Form\Type;

namespace Abenmada\BackofficePlugin\Form\Type;

use Sylius\Bundle\CoreBundle\Form\Type\ImageType;

final class ChannelImageType extends ImageType
{
    public function getBlockPrefix(): string
    {
        return 'abenmada_backoffice_channel_image_type';
    }
}
