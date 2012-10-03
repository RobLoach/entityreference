<?php

/**
 * @file
 * Definition of Drupal\entityreference\Plugin\Type\Selection\SelectionInterface.
 */

namespace Drupal\entityreference\Plugin\Type\Selection;

/**
 * Interface definition for field widget plugins.
 *
 * This interface details the methods that most plugin implementations will want
 * to override. See Drupal\field\Plugin\Type\Selection\SelectionBaseInterface for base
 * wrapping methods that should most likely be inherited directly from
 * Drupal\entityreference\Plugin\Type\Selection\SelectionBase..
 */
interface SelectionInterface  {

  /**
   * Factory function: create a new instance of this handler for a given field.
   *
   * @param $field
   *   A field datastructure.
   * @return EntityReferenceHandler
   */
  public static function getInstance($field, $instance = NULL, $entity_type = NULL, $entity = NULL);

  /**
   * Return a list of referencable entities.
   *
   * @return
   *   An array of referencable entities, which keys are entity ids and
   *   values (safe HTML) labels to be displayed to the user.
   */
  public function getReferencableEntities($match = NULL, $match_operator = 'CONTAINS', $limit = 0);

  /**
   * Count entities that are referencable by a given field.
   */
  public function countReferencableEntities($match = NULL, $match_operator = 'CONTAINS');

  /**
   * Validate that entities can be referenced by this field.
   *
   * @return
   *   An array of entity ids that are valid.
   */
  public function validateReferencableEntities(array $ids);

  /**
   * Validate Input from autocomplete widget that has no Id.
   *
   * @see _entityreference_autocomplete_validate()
   *
   * @param $input
   *   Single string from autocomplete widget.
   * @param $element
   *   The form element to set a form error.
   * @return
   *   Value of a matching entity id, or NULL if none.
   */
  public function validateAutocompleteInput($input, &$element, &$form_state, $form);

  /**
   * Give the handler a chance to alter the SelectQuery generated by EntityFieldQuery.
   *
   * @todo: This causes Declaration error
   */
  //public function entityFieldQueryAlter(SelectQueryInterface $query);

  /**
   * Generate a settings form for this handler.
   */
  public static function settingsForm($field, $instance);
}
