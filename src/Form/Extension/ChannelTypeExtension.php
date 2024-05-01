<?php

declare(strict_types=1);

namespace Abenmada\BackofficePlugin\Form\Extension;

use Abenmada\BackofficePlugin\Form\Type\ChannelImageType;
use Sylius\Bundle\ChannelBundle\Form\Type\ChannelType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\FormBuilderInterface;

final class ChannelTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('colorPrimaryButton', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.color_primary_button',
            ])
            ->add('backgroundColorPrimaryButton', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.background_color_primary_button',
            ])
            ->add('colorLink', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.color_link',
            ])
            ->add('colorCheckbox', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.color_checkbox',
            ])
            ->add('colorHeaderIcon', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.color_header_icon',
            ])
            ->add('backgroundColorHeaderIcon', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.background_color_header_icon',
            ])
            ->add('colorSortableActiveColumn', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.color_sortable_active_column',
            ])
            ->add('backgroundColorMenu', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.background_color_menu',
            ])
            ->add('colorSubItem', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.color_sub_item',
            ])
            ->add('colorSubItemHover', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.color_sub_item_hover',
            ])
            ->add('colorSubItemActive', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.color_sub_item_active',
            ])
            ->add('backgroundColorSubItemActive', ColorType::class, [
                'required' => true,
                'label' => 'abenmada_backoffice_plugin.form.background_color_sub_item_active',
            ])
            ->add('images', CollectionType::class, [
                'entry_type' => ChannelImageType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'label' => 'abenmada_backoffice_plugin.form.images',
            ]);
    }

    public function getExtendedType(): string
    {
        return ChannelType::class;
    }

    public static function getExtendedTypes(): iterable
    {
        return [ChannelType::class];
    }
}
