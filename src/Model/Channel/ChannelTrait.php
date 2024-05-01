<?php

declare(strict_types=1);

namespace Abenmada\BackofficePlugin\Model\Channel;

use Abenmada\BackofficePlugin\Entity\Channel\ChannelImage;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ImageInterface;

trait ChannelTrait
{
    /** @ORM\Column(name="abenmada_color_primary_button", type="string", nullable=false, options={"default": "#FFFFFF"}) */
    private string $colorPrimaryButton = '#FFFFFF';

    /** @ORM\Column(name="abenmada_background_color_primary_button", type="string", nullable=false, options={"default": "#00B5AD"}) */
    private string $backgroundColorPrimaryButton = '#00B5AD';

    /** @ORM\Column(name="abenmada_color_link", type="string", nullable=false, options={"default": "#00B5AD"}) */
    private string $colorLink = '#00B5AD';

    /** @ORM\Column(name="abenmada_color_checkbox", type="string", nullable=false, options={"default": "#00B5AD"}) */
    private string $colorCheckbox = '#00B5AD';

    /** @ORM\Column(name="abenmada_color_header_icon", type="string", nullable=false, options={"default": "#00B5AD"}) */
    private string $colorHeaderIcon = '#00B5AD';

    /** @ORM\Column(name="abenmada_background_color_header_icon", type="string", nullable=false, options={"default": "#E3F3F0"}) */
    private string $backgroundColorHeaderIcon = '#E3F3F0';

    /** @ORM\Column(name="abenmada_color_sortable_active_column", type="string", nullable=false, options={"default": "#00B5AD"}) */
    private string $colorSortableActiveColumn = '#00B5AD';

    /** @ORM\Column(name="abenmada_background_color_menu", type="string", nullable=false, options={"default": "#1E212B"}) */
    private string $backgroundColorMenu = '#1E212B';

    /** @ORM\Column(name="abenmada_color_sub_item", type="string", nullable=false, options={"default": "#8E9095"}) */
    private string $colorSubItem = '#8E9095';

    /** @ORM\Column(name="abenmada_color_sub_item_hover", type="string", nullable=false, options={"default": "#FFFFFF"}) */
    private string $colorSubItemHover = '#FFFFFF';

    /** @ORM\Column(name="abenmada_color_sub_item_active", type="string", nullable=false, options={"default": "#FFFFFF"}) */
    private string $colorSubItemActive = '#FFFFFF';

    /** @ORM\Column(name="abenmada_background_color_sub_item_active", type="string", nullable=false, options={"default": "#00B5AD"}) */
    private string $backgroundColorSubItemActive = '#00B5AD';

    /** @ORM\OneToMany(targetEntity=ChannelImage::class, mappedBy="owner", orphanRemoval=true, cascade={"all"}) */
    private Collection $images;

    public function getColorPrimaryButton(): string
    {
        return $this->colorPrimaryButton;
    }

    public function setColorPrimaryButton(string $colorPrimaryButton): void
    {
        $this->colorPrimaryButton = $colorPrimaryButton;
    }

    public function getBackgroundColorPrimaryButton(): string
    {
        return $this->backgroundColorPrimaryButton;
    }

    public function setBackgroundColorPrimaryButton(string $backgroundColorPrimaryButton): void
    {
        $this->backgroundColorPrimaryButton = $backgroundColorPrimaryButton;
    }

    public function getColorLink(): string
    {
        return $this->colorLink;
    }

    public function setColorLink(string $colorLink): void
    {
        $this->colorLink = $colorLink;
    }

    public function getColorCheckbox(): string
    {
        return $this->colorCheckbox;
    }

    public function setColorCheckbox(string $colorCheckbox): void
    {
        $this->colorCheckbox = $colorCheckbox;
    }

    public function getColorHeaderIcon(): string
    {
        return $this->colorHeaderIcon;
    }

    public function setColorHeaderIcon(string $colorHeaderIcon): void
    {
        $this->colorHeaderIcon = $colorHeaderIcon;
    }

    public function getBackgroundColorHeaderIcon(): string
    {
        return $this->backgroundColorHeaderIcon;
    }

    public function setBackgroundColorHeaderIcon(string $backgroundColorHeaderIcon): void
    {
        $this->backgroundColorHeaderIcon = $backgroundColorHeaderIcon;
    }

    public function getColorSortableActiveColumn(): string
    {
        return $this->colorSortableActiveColumn;
    }

    public function setColorSortableActiveColumn(string $colorSortableActiveColumn): void
    {
        $this->colorSortableActiveColumn = $colorSortableActiveColumn;
    }

    public function getBackgroundColorMenu(): string
    {
        return $this->backgroundColorMenu;
    }

    public function setBackgroundColorMenu(string $backgroundColorMenu): void
    {
        $this->backgroundColorMenu = $backgroundColorMenu;
    }

    public function getColorSubItem(): string
    {
        return $this->colorSubItem;
    }

    public function setColorSubItem(string $colorSubItem): void
    {
        $this->colorSubItem = $colorSubItem;
    }

    public function getColorSubItemHover(): string
    {
        return $this->colorSubItemHover;
    }

    public function setColorSubItemHover(string $colorSubItemHover): void
    {
        $this->colorSubItemHover = $colorSubItemHover;
    }

    public function getColorSubItemActive(): string
    {
        return $this->colorSubItemActive;
    }

    public function setColorSubItemActive(string $colorSubItemActive): void
    {
        $this->colorSubItemActive = $colorSubItemActive;
    }

    public function getBackgroundColorSubItemActive(): string
    {
        return $this->backgroundColorSubItemActive;
    }

    public function setBackgroundColorSubItemActive(string $backgroundColorSubItemActive): void
    {
        $this->backgroundColorSubItemActive = $backgroundColorSubItemActive;
    }

    public function getImages(): Collection
    {
        return $this->images;
    }

    public function getImagesByType(string $type): Collection
    {
        return $this->images->filter(static function (ImageInterface $image) use ($type) {
            return $type === $image->getType();
        });
    }

    public function hasImages(): bool
    {
        return ! $this->images->isEmpty();
    }

    public function hasImage(ImageInterface $image): bool
    {
        return $this->images->contains($image);
    }

    public function addImage(ImageInterface $image): void
    {
        $image->setOwner($this);
        $this->images->add($image);
    }

    public function removeImage(ImageInterface $image): void
    {
        if (! $this->hasImage($image)) {
            return;
        }

        $image->setOwner(null);
        $this->images->removeElement($image);
    }
}
