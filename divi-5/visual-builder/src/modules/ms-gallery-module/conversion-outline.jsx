const convertInlineFont = (value) => (typeof value === 'string' ? value.split(',') : []);

export const conversionOutline = {
  advanced: {
    admin_label:    'module.meta.adminLabel',
    animation:      'module.decoration.animation',
    background:     'module.decoration.background',
    disabled_on:    'module.decoration.disabledOn',
    module:         'module.advanced.htmlAttributes',
    overflow:        'module.decoration.overflow',
    position_fields: 'module.decoration.position',
    scroll:         'module.decoration.scroll',
    sticky:         'module.decoration.sticky',
    text:           'module.advanced.text',
    transform:      'module.decoration.transform',
    transition:     'module.decoration.transition',
    z_index:        'module.decoration.zIndex',
    margin_padding: 'module.decoration.spacing',
    max_width:      'module.decoration.sizing',
    height:         'module.decoration.sizing',
    link_options:   'module.advanced.link',
    fonts:      {
      header:         'title.decoration.font',
      body:           'content.decoration.bodyFont.body',
      body_link:      'content.decoration.bodyFont.link',
      body_ul:        'content.decoration.bodyFont.ul',
      body_ol:        'content.decoration.bodyFont.ol',
      body_quote:     'content.decoration.bodyFont.quote',
    },
    text_shadow:     {
      default: 'module.advanced.text.textShadow',
    },
    box_shadow: {
      default: 'module.decoration.boxShadow',
    },
    borders:        {
      default: 'module.decoration.border',
    },
    filters:   {
      default: 'module.decoration.filters',
    },
  },
  css: {
    after:        'css.*.after',
    before:       'css.*.before',
    main_element: 'css.*.mainElement',
    title:        'css.*.title',
    content:      'css.*.content',
  },
  content: {
    gallery_ids:        'gallery_ids',
    gallery_style:      'gallery_style',
    gallery_image_size: 'gallery_image_size',
    gallery_image_link: 'gallery_image_link',
    grid_column:        'grid_column',
    grid_row_gap:       'grid_row_gap',
    grid_column_gap:    'grid_column_gap',
    overlay_content:    'overlay_content',
    overlay_color:      'overlay_color',
    overlay_text_color: 'overlay_text_color',
    image_object_fit:   'image_object_fit',
  },
  module: {
    title:        'title.innerContent.*',
    content:      'content.innerContent.*',
    header_level: 'title.decoration.font.font.*.headingLevel',
    inline_fonts: 'content.decoration.inlineFont.*.families',
  },
  valueExpansionFunctionMap: {
    inline_fonts: convertInlineFont
  },
};