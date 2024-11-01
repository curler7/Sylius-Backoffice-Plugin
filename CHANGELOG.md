# CHANGELOG

## CHANGELOG FOR `1.0.0` (2024-05-01)

#### Details

- Uploading images related to the channel that you can display in the e-shop as logos or other visuals.
- Managing back-office colors: main buttons color, main button background color, links color, checkbox color, header icons color, header icons background color, grid column sort icons color, admin menu background color, admin menu tab color, admin menu tab color on hover, admin menu active tab color, admin menu active tab background color.

## CHANGELOG FOR `v1.0.1` (2024-05-01)

#### Details
- Adding phpstan and php-cs-fixer
- Configure github workflow
- Upgrade dependencies

## CHANGELOG FOR `v1.0.2` (2024-05-05)

- Support Doctrine mapping metadata using PHP attributes
- Upgrade dependencies

## CHANGELOG FOR `v1.0.3` (2024-05-12)

- Update plugin name

## [Unreleased]
### Added
- **Dependency Injection:**
    - Introduced `ResolveTargetEntityCompilerPass` to resolve the target entity class for `ChannelInterface`.

  See [ResolveTargetEntityCompilerPass.php](src/DependencyInjection/Compiler/ResolveTargetEntityCompilerPass.php)


- **Entity Management:**
    - Updated `ChannelImage` entity class to establish a many-to-one relationship with `ChannelInterface`, allowing for the management of channel-specific images through an interface instead of a class.

  See [ChannelImage.php](src/Entity/Channel/ChannelImage.php)


- **Migrations:**
    - Created migration class `Version20241101104421` for PostgreSQL to manage the database schema changes, including the creation of the `abenmada_backoffice_channel_image` table and additional fields in the `sylius_channel` table.

  See [Version20241101104421.php](src/Migrations/Version20241101104421.php)

### Configuration
- Added configuration parameter `abenmada.backoffice.channel_class` to allow customization of the channel entity class. Users can specify this parameter directly in the configuration file or through the environment variable `ABENMADA_BACKOFFICE_CHANNEL_CLASS`, which defaults to `App\Entity\Channel\Channel`.

  See [services.yaml](src/Resources/config/services.yaml)

### Translations
- Added German translations for the backoffice plugin interface and forms to enhance localization support.

  See [messages.de.yml](src/Resources/translations/messages.de.yml)