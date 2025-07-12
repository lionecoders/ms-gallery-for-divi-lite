export const MGFD_gallery_style = (props) => {
  const mgfd_style = [];
  const {
    grid_column,
    image_height,
    grid_column_gap,
    grid_row_gap,
    gallery_style,
    accordion_overlay_color
  } = props;

  if (grid_column !== undefined && grid_column !== '') {
    mgfd_style.push(
      [
        {
          selector: '%%order_class%% .mgfd-ms-gallery-grid-item, %%order_class%% .mgfd-ms-gallery-masonry-container',
          declaration: `--mgfd-grid_column: ${grid_column} !important`,
        }
      ]
    )
  }

  if (image_height !== undefined && image_height !== '') {
    mgfd_style.push(
      [
        {
          selector: '%%order_class%% .mgfd-ms-gallery-grid-container, %%order_class%% .mgfd-ms-gallery-accordion-item',
          declaration: `--mgfd-height-column: ${image_height} !important`,
        }
      ]
    )
  }

  if (grid_column_gap !== undefined && grid_column_gap !== '' && gallery_style !== 'masonry') {

    mgfd_style.push(
      [
        {
          selector: '%%order_class%% .mgfd-ms-gallery-grid-container, %%order_class%% .mgfd-ms-gallery-masonry-container',
          declaration: `--mgfd-grid-horizontal-gap: ${grid_column_gap} !important`,
        }
      ]
    )
  }else {
    mgfd_style.push(
      [
        {
          selector: '%%order_class%% .mgfd-ms-gallery-masonry-container',
          declaration: `--mgfd-masonry-horizontal-gap: ${grid_column_gap} !important`,
        }
      ]
    )
  }

  if (grid_row_gap !== undefined && grid_row_gap !== '' && gallery_style !== 'masonry') {

    mgfd_style.push(
      [
        {
          selector: '%%order_class%% .mgfd-ms-gallery-grid-container, %%order_class%% .mgfd-ms-gallery-masonry-item',
          declaration: `--mgfd-grid-vertical-gap: ${grid_row_gap} !important`,
        }
      ]
    )
  }else {
    mgfd_style.push(
      [
        {
          selector: '%%order_class%% .mgfd-ms-gallery-masonry-item',
          declaration: `--mgfd-masonry-vertical-gap: ${grid_row_gap} !important`,
        }
      ]
    )
  }

  if (accordion_overlay_color !== undefined && accordion_overlay_color !== '') {
    mgfd_style.push(
      [
        {
          selector: '%%order_class%% .mgfd-ms-gallery-accordion-item::before',
          declaration: `--mgfd-accordion-overlay-color: ${accordion_overlay_color} !important`,
        }
      ]
    )
  }

  return mgfd_style;
}