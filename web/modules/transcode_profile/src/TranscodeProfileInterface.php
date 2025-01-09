<?php

declare(strict_types=1);

namespace Drupal\transcode_profile;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface defining a transcode profile entity type.
 */
interface TranscodeProfileInterface extends ConfigEntityInterface {

    public function getCodec(): string;
    public function setCodec($codec);
}
