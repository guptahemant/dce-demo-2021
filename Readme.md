# Introduction
This is a demo repository intended to demonstrate how an effective cache control
and effective purge mechanism can be setup by using Drupal and Akamai.
This setup was demonstrated on drupal con europe 2021, Seesion Deck can be found at https://docs.google.com/presentation/d/1kNkMEyXyUMw6YWuFGibSUIlV0I7q5dbSMk5xTb9jQ38

# Purge Modules added
* Purge: https://www.drupal.org/project/purge
* Akamai: https://www.drupal.org/project/akamai
* Purge queues: https://www.drupal.org/project/purge_queues
* Purge control: https://www.drupal.org/project/purge_control
* Purge akamai optimizer: https://www.drupal.org/project/purge_akamai_optimizer
* Purge everything Queuer: https://www.drupal.org/project/purge_everything_queuer
* Purge ajax processor: https://www.drupal.org/project/purge_ajax_processor


# Following things are included:
* A dce_demo custom module which provides:
  - A block demonstrating the cache variations on the basis of cookie. Also provides event subscriber to add that as a vary header.
  - The same block is adding multiple cache tags so that akamai reduction and hashing logic could be observed
  - Contains a test drush command, and provides a sample of automated disable and enable of purging on execution of that command.
* Includes Cache configuration setup using various purge and its related module in config/default directory.
* Example config setup to be done at akamai control panel: https://github.com/guptahemant/dce-demo-2021/blob/master/akamai_cache_setup/Readme.md
