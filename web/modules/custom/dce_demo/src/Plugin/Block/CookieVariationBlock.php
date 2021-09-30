<?php

namespace Drupal\dce_demo\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Provides a cookie variation block.
 *
 * @Block(
 *   id = "cookie_variation_block",
 *   admin_label = @Translation("Cookie variation block")
 * )
 */
class CookieVariationBlock extends BlockBase implements ContainerFactoryPluginInterface {

  const COOKIE_NAME = 'acquia_a';

  /**
   * The request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, RequestStack $requestStack) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->requestStack = $requestStack;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('request_stack')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $value = $this->requestStack->getCurrentRequest()->cookies->get(self::COOKIE_NAME);
    $build = [
      '#type' => 'container',
      'buttons' => [
        '#type' => 'container',
        '#attributes' => [
          'class' => ['cookie-buttons'],
        ],
        'button_1' => [
          '#type' => 'button',
          '#value' => 'Cookie A',
          '#attributes' => [
            'class' => ['button', 'btn'],
          ],
        ],
        'button_2' => [
          '#type' => 'button',
          '#value' => 'Cookie B',
          '#attributes' => [
            'class' => ['button', 'btn'],
          ],
        ],
      ],
      'cookie_value' => [
        '#markup' => 'Stored value: ' . ($value ?? 'None'),
      ],
    ];
    $build['#attached']['library'][] = 'dce_demo/cookie_variation';

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheTags() {
    // Add some dummy tags to demonstrate how we can comporess cache tags on
    // a page for Akamai. This is not needed for the cookie based variation to
    // work.
    $dummy_tags = [];
    for ($i = 1; $i <= 100; $i++) {
      $dummy_tags[] = "dce_tag:$i";
    }
    return parent::getCacheTags() + $dummy_tags;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    $contexts = [
      'cookies:' . self::COOKIE_NAME,
    ];
    return parent::getCacheContexts() + $contexts;
  }

}
