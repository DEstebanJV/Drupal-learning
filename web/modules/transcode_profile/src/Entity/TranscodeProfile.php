<?php

declare(strict_types=1);

namespace Drupal\transcode_profile\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\transcode_profile\TranscodeProfileInterface;

/**
 * Defines the transcode profile entity type.
 *
 * @ConfigEntityType(
 *   id = "transcode_profile",
 *   label = @Translation("Transcode profile"),
 *   label_collection = @Translation("Transcode profiles"),
 *   label_singular = @Translation("transcode profile"),
 *   label_plural = @Translation("transcode profiles"),
 *   label_count = @PluralTranslation(
 *     singular = "@count transcode profile",
 *     plural = "@count transcode profiles",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\transcode_profile\TranscodeProfileListBuilder",
 *     "form" = {
 *       "add" = "Drupal\transcode_profile\Form\TranscodeProfileForm",
 *       "edit" = "Drupal\transcode_profile\Form\TranscodeProfileForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *   },
 *   config_prefix = "transcode_profile",
 *   admin_permission = "administer transcode_profile",
 *   links = {
 *     "collection" = "/admin/structure/transcode-profile",
 *     "add-form" = "/admin/structure/transcode-profile/add",
 *     "edit-form" = "/admin/structure/transcode-profile/{transcode_profile}",
 *     "delete-form" = "/admin/structure/transcode-profile/{transcode_profile}/delete",
 *   },
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "description",
 *     "codec",
 *   },
 * )
 */
final class TranscodeProfile extends ConfigEntityBase implements TranscodeProfileInterface {

  /**
   * The example ID.
   */
  protected string $id = '';

  /**
   * The example label.
   */
  protected string $label = '';

  /**
   * The example codec.
   */
  protected string $codec = '';

  public function getCodec(): string {
    return $this->get('codec') ?? '';
  }

  public function setCodec($codec) {
    // Do something to the data.
    $codec = strtolower($codec);
  
    // Set the new value
    $this->set('codec', $codec);
    return $this;
  }

}
