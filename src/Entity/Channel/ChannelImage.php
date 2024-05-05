<?php

declare(strict_types=1);

namespace Abenmada\BackofficePlugin\Entity\Channel;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Channel;
use Sylius\Component\Core\Model\Image;

/**
 * @ORM\Entity
 *
 * @ORM\Table(name="abenmada_backoffice_channel_image")
 */
#[ORM\Table(name: 'abenmada_backoffice_channel_image')]
#[ORM\Entity]
class ChannelImage extends Image
{
    /**
     * @ORM\ManyToOne(targetEntity=Channel::class, inversedBy="images")
     *
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id", nullable=false, onDelete="cascade")
     *
     * @var object|null
     */
    #[ORM\JoinColumn(name: 'owner_id', referencedColumnName: 'id', nullable: false, onDelete: 'cascade')]
    #[ORM\ManyToOne(targetEntity: Channel::class, inversedBy: 'images')]
    protected $owner;
}
