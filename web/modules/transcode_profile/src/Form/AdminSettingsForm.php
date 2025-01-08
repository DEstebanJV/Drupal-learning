<?php

declare(strict_types=1);

namespace Drupal\transcode_profile\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Transcode profile settings for this site.
 */
final class AdminSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'admin_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['transcode_profile.adminsettings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('transcode_profile.adminsettings');
    $form['profile_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Profile Name'),
      '#description' => $this->t('Video transcode profile name'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('profile_name'),
    ];
    $form['profile_email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Profile Email'),
      '#description' => $this->t('Video transcode profile email'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('profile_email'),
    ];
    $form['enable_transcoding'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable transcoding'),
      '#description' => $this->t('Enables video transcoding'),
      '#default_value' => $config->get('enable_transcoding'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    // @todo Validate the form here.
    // Example:
    // @code
    //   if ($form_state->getValue('example') === 'wrong') {
    //     $form_state->setErrorByName(
    //       'message',
    //       $this->t('The value is not correct.'),
    //     );
    //   }
    // @endcode
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('transcode_profile.adminsettings')
      ->set('profile_name', $form_state->getValue('profile_name'))
      ->set('profile_email', $form_state->getValue('profile_email'))
      ->set('enable_transcoding', $form_state->getValue('enable_transcoding'))
      ->save();
  }

}
