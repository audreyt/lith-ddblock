<?php
// $Id$

/**
 * @file
 *  admin blocks of the ddblock module
 *
 * @see ddblock.module
 */

/**
 * Form with overview of all dynamic display blocks and headerimage blocks to manage and to add dynamic display blocks
 */
function ddblock_settings_block_add() {

  // get dynamic display  block
  $rows = array();
  $ddblock = ddblock_get_blocks();

  foreach ($ddblock as $delta => $block) {
    $rows[] = array(
      'name' => check_plain($block),
      'edit' => l(t('Edit'), "admin/settings/ddblock/edit/$delta"),
      'delete' => l(t('Delete'), "admin/settings/ddblock/delete/$delta"),
      'block' => l(t('Configure block'), "admin/build/block/configure/ddblock/$delta"),
    );
  }
  if (empty($rows)) {
    $rows[] = array(array('data' => t('No dynamic display blocks available.'), 'colspan' => '4'));
  }
  $header = array(t('Name'), array('data' => t('Operation'), 'colspan' => '3'));
  $output = theme('table', $header, $rows, array('id' => 'dynamic display block'));

  $form = array();
  $form['list'] = array(
    '#type' => 'fieldset',
    '#title' => t('Dynamic display blocks'),
   '#collapsible' => TRUE,
  );
  $form['list']['table'] = array(
    '#prefix' => '<div>',
    '#value' => $output,
    '#suffix' => '</div>',
  );

  // get headerimage blocks
  $rows = array();
  if (module_exists('headerimage')) {
    $headerimageblocks = headerimage_get_blocks();
    foreach ($headerimageblocks as $delta => $block) {
      $rows[] = array(
        'name' => check_plain($block),
        'edit' => l(t('Edit'), "admin/settings/headerimage/edit/$delta"),
        'delete' => l(t('Delete'), "admin/settings/headerimage/delete/$delta"),
        'block' => l(t('Configure block'), "admin/build/block/configure/headerimage/$delta"),
      );
    }
    if (empty($rows)) {
      $rows[] = array(array('data' => t('No Header Image blocks available.'), 'colspan' => '4'));
    }
    $header = array(t('Name'), array('data' => t('Operation'), 'colspan' => '3'));
    $output = theme('table', $header, $rows, array('id' => 'headerimage'));

    $form['list_headerimage'] = array(
      '#type' => 'fieldset',
      '#title' => t('Header Image blocks'),
      '#collapsible' => TRUE,
      '#description' => 'Available Header Image blocks. To add a Header Image block go to the Header Image module settings.',
    );

    $form['list_headerimage']['table'] = array(
      '#prefix' => '<div>',
      '#value' => $output,
      '#suffix' => '</div>',
    );
  }

  // add dynamic display  block
  $form['block'] = array(
    '#type' => 'fieldset',
    '#title' => t('Add dynamic display block.'),
  );

  $form['block']['title'] = array(
    '#type' => 'textfield',
    '#title' => t('Block title'),
    '#description' => t('A block with this same name will be created.'),
    '#default_value' => '',
    '#required' => TRUE,
  );

  $form['block']['op'] = array(
    '#type' => 'submit',
    '#value' => t('Add block'),
  );

  return $form;
}

/**
 * Validate "Add Block" form.
 */
function ddblock_settings_block_add_validate($form, &$form_state) {
  $blocks = ddblock_get_blocks();

  if (!empty($blocks)) {
    // Check if name is unique
    if (in_array($form_state['values']['title'], $blocks)) {
      form_set_error('', t('Dynamic display block %s already exists. Please use a different name.', array('%s' => $form_state['values']['title'])));
    }
  }
}
/**
 * Add dynamic display block to database from "Add Block" form.
 */
function ddblock_settings_block_add_submit($form, &$form_state) {
  db_query("INSERT INTO {ddblock_block} (title) VALUES ('%s')", $form_state['values']['title']);

  drupal_set_message(t('Dynamic display block %s added.', array('%s' => $form_state['values']['title'])));
}

/**
 * Edit block form
 */
function ddblock_settings_block_edit(&$form_state, $delta) {
  $blocks = ddblock_get_blocks();

  $form = array();

  $form['delta'] = array(
    '#type' => 'hidden',
    '#value' => $delta,
  );

  $form['title'] = array(
    '#type' => 'textfield',
    '#title' => t('Block title'),
    '#description' => t('The block name must be unique.'),
    '#default_value' => $blocks[$delta],
    '#required' => TRUE,
  );

  $form['op'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
  );

  $form['#redirect'] = 'admin/settings/ddblock';

  return $form;
}

/**
 * Validate edit block form
 */
function ddblock_settings_block_edit_validate($form, &$form_state) {
  $blocks = ddblock_get_blocks();

  // Remove current blockname to prevent false error
  unset($blocks[$form_state['values']['delta']]);

  if (!empty($blocks)) {
    // Check if name is unique
    if (in_array($form_state['values']['title'], $blocks)) {
      form_set_error('', t('Dynamic display block %s already exists. Please use a different name.', array('%s' => $form_state['values']['title'])));
    }
  }
}

/**
 * Submit edit block form
 */
function ddblock_settings_block_edit_submit($form, &$form_state) {
  db_query("UPDATE {ddblock_block} SET title = '%s' WHERE delta = %d",
    $form_state['values']['title'], $form_state['values']['delta']);

  drupal_set_message(t('Dynamic display block block updated.'));
  return 'admin/settings/ddblock';
}

/**
 * Delete block form.
 */
function ddblock_block_confirm_delete(&$form_state, $delta) {
  $blocks = ddblock_get_blocks();
  $form['delta'] = array('#type' => 'value', '#value' => $delta);
  $form['#redirect'] = 'admin/settings/ddblock';
    return confirm_form(
      $form,
      t('Are you sure you want to delete the dynamic display block %title?', array('%title' => $blocks[$delta])),
      'admin/settings/ddblock',
      t('This action cannot be undone.'),
      t('Delete'), t('Cancel')
    );
}

/**
 * Delete a dynamic display block from the database.
 */
function ddblock_block_confirm_delete_submit($form, &$form_state) {
  db_query("DELETE from {ddblock_block} WHERE delta = %d", $form_state['values']['delta']);
  variable_del('ddblock_block_ddblock_'. $delta .'_cycle_settings');
  //to do: delete variable from the headerimage block

  drupal_set_message(t('dynamic display block deleted'));
  return 'admin/settings/ddblock';
}

/**
 * Dynamic display block settings form for setting the content types to be used with the dynamic display block module
 */
function ddblock_settings_form() {
  $form = array();

  // get a list of all available content types,  names parameter is used to get an associative array of content type names
  // the key is the machine-readable name of the content type and the value the human-readable name of the content type
  $content_types = node_get_types('names');

  $form['ddblock_node_type'] = array(
   '#type' => 'checkboxes',
   '#title' => t('Content types'),
   '#description' => t('The content type(s) that can be used with the dynamic display block module.'),
   '#default_value' => variable_get('ddblock_node_type', array()),
   '#options' => $content_types,
   '#multiple' => TRUE,
   '#required' => TRUE,
  );

  $form['#redirect'] = 'admin/settings/ddblock/list';

  return system_settings_form($form);
}
