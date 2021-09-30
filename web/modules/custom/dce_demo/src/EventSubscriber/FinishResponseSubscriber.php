<?php

namespace Drupal\dce_demo\EventSubscriber;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * A Class for FinishResponseSubscriber.
 */
class FinishResponseSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      KernelEvents::RESPONSE => 'onRespond',
    ];
  }

  /**
   * Sets extra headers on successful responses.
   *
   * @param \Symfony\Component\HttpKernel\Event\FilterResponseEvent $event
   *   The event to process.
   */
  public function onRespond(FilterResponseEvent $event) {
    $response = $event->getResponse();

    // Setting X-Acquia-Cookie-A header for Acquia varnish.
    // Cookie is set here so that browsers can vary.
    // Ideally this should be set only on those responses where the cache
    // context block is enabled.
    $response->headers->set('Vary', ['X-Acquia-Cookie-A', 'Cookie'], FALSE);
  }

}
