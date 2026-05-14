const {
  StyleContainer,
  CommonStyle
} = window?.divi?.module;

/**
 * Module style component for static module
 */
export const ModuleStyles = ({
  attrs,
  elements,
  settings,
  orderClass,
  mode,
  state,
  noStyleTag
}) => (
  <StyleContainer mode={mode} state={state} noStyleTag={noStyleTag}>
    <CommonStyle
      selector={`${orderClass} .mgfd-gallery-wrapper img`}
      attr={attrs?.image_object_fit?.desktop?.value}
      declarationFunction={(attrs) => {
        const data = attrs?.attrValue?.image_object_fit ?? attrs?.attrValue
        return `--mgfd-image-object-fit: ${data};`;
      }}
    />
    <CommonStyle
      selector={`${orderClass} .mgfd-ms-gallery-masonry-container`}
      attr={attrs?.grid_column}
      declarationFunction={(attrs) => {
        const data = attrs?.attrValue?.grid_column ?? attrs?.attrValue
        return `--mgfd-grid_column: ${data};`;
      }}
    />
    <CommonStyle
      selector={`${orderClass} .mgfd-ms-gallery-masonry-container`}
      attr={attrs?.grid_column_gap}
      declarationFunction={(attrs) => {
        console.log(attrs);
        const data = attrs?.attrValue?.grid_column_gap ?? attrs?.attrValue
        return `--mgfd-masonry-horizontal-gap: ${data};`;
      }}
    />
    <CommonStyle
      selector={`${orderClass} .mgfd-ms-gallery-masonry-container`}
      attr={attrs?.grid_row_gap}
      declarationFunction={(attrs) => {
        const data = attrs?.attrValue?.grid_row_gap ?? attrs?.attrValue
        return `--mgfd-masonry-vertical-gap: ${data};`;
      }}
    />
    <CommonStyle
      selector={`${orderClass} .mgfd-ms-gallery-overlay-content`}
      attr={attrs?.overlay_color}
      declarationFunction={(attrs) => {
        const data = attrs?.attrValue?.overlay_color ?? attrs?.attrValue
        return `--mgfd-overlay-color: ${data};`;
      }}
    />
    <CommonStyle
      selector={`${orderClass} .mgfd-ms-gallery-overlay-content`}
      attr={attrs?.overlay_text_color}
      declarationFunction={(attrs) => {
        const data = attrs?.attrValue?.overlay_text_color ?? attrs?.attrValue
        return `--mgfd-overlay-text-color: ${data};`;
      }}
    />
    {/* Element: image */}
    {elements.style({
      attrName: 'image_style',
    })}
  </StyleContainer>
);