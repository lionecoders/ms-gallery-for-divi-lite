import metadata from './module.json';

import { __ } from '@wordpress/i18n';

const customCssFields = metadata.customCssFields || {};

// Add labels to custom CSS fields for Visual Builder
// customCssFields.title.label   = __('Title', 'ms-gallery-for-divi');
// customCssFields.content.label = __('Content', 'ms-gallery-for-divi');

export const cssFields = { ...customCssFields };