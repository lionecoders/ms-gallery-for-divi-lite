import React from 'react';

import { __ } from '@wordpress/i18n';

const { UploadGallery, SelectContainer, ToggleContainer, RangeContainer } = window?.divi?.fieldLibrary;
const {
  AdminLabelGroup,
  BackgroundGroup,
  FieldContainer,
  GroupContainer,
  LinkGroup,
} = window?.divi?.module;

const imageSize = {
  'thumbnail': 'Thumbnail',
  'full': 'Full'
}
const style = {
  'masonry': 'Masonry'
}


const mgfdlContext = React.createContext(null);

const ContextField = ({ attrName, subName, children, defaultAttr: explicitDefaultAttr, ...rest }) => {
  const dsa = React.useContext(mgfdlContext);
  let computedDefaultAttr = explicitDefaultAttr;
  if (!computedDefaultAttr && dsa && attrName) {
    let raw = dsa?.[attrName]?.desktop?.value;
    console.log(raw);
    if ((raw === undefined || raw === null) && subName) {
      raw = dsa?.[subName]?.desktop?.value;
    }
    if (raw !== undefined && raw !== null) {
      const scalar = (typeof raw === 'object' && !Array.isArray(raw))
        ? (subName ? raw[subName] : raw)
        : raw;
      computedDefaultAttr = subName
        ? { desktop: { value: { [subName]: scalar } } }
        : { desktop: { value: scalar } };
    }
  }
  return React.createElement(
    FieldContainer,
    { attrName, subName, defaultAttr: computedDefaultAttr, ...rest },
    children
  );
};


/**
 * Content Settings panel for the Dynamic Module.
 */
export const SettingsContent = (props) => (
  <React.Fragment>
    <GroupContainer
      id="mainContent"
      title={__('Main Settings', 'd5-tutorial-module-conversion')}
    >
      <ContextField
        attrName="gallery_ids"
        label={__('Choose Images', 'ms-gallery-for-divi-lite')}
        description={__('Choose the images that you would like to appear in the image gallery.', 'ms-gallery-for-divi-lite')}
        features={{
          sticky: false,
        }}
      >
        <UploadGallery />
      </ContextField>
      <ContextField
        attrName="gallery_image_size"
        subName="gallery_image_size"
        label={__('Image Size', 'ms-gallery-for-divi-lite')}
        description={__('Set the size of the image.', 'ms-gallery-for-divi-lite')}
        defaultValue={'full'}
      >
        <SelectContainer
          options={Object.entries(imageSize).reduce((acc, [key, label]) => {
            acc[key] = {
              label: __(label, 'ms-gallery-for-divi-lite'),
              value: key,
            };
            return acc;
          }, {})}
        />
      </ContextField>
      <ContextField
        attrName="overlay_content"
         subName="overlay_content"
        label={__('Overlay Content', 'ms-gallery-for-divi-lite')}
        description={__('Text entered here will appear as title.', 'd5-tutorial-module-conversion')}
      >
        <ToggleContainer />
      </ContextField>
      <ContextField
        attrName="gallery_style"
        subName="gallery_style"
        label={__('Gallery Style', 'ms-gallery-for-divi-lite')}
        description={__('Set the style of the gallery.', 'ms-gallery-for-divi-lite')}
      >
        <SelectContainer
          options={Object.entries(style).reduce((acc, [key, label]) => {
            acc[key] = {
              label: __(label, 'ms-gallery-for-divi-lite'),
              value: key,
            };
            return acc;
          }, {})}
        />
      </ContextField>
      <ContextField
        attrName="grid_column"
        subName="grid_column" 
        label={__('Grid Columns', 'ms-gallery-for-divi-lite')}
        description={__('Set the number of columns.', 'ms-gallery-for-divi-lite')}
      >
        <RangeContainer defaultUnit="" min={1} max={5} />
      </ContextField>
      <ContextField
        attrName="grid_row_gap"
        subName="grid_row_gap"
        label={__('Row Gap', 'ms-gallery-for-divi-lite')}
        description={__('Set the gap between the row.', 'ms-gallery-for-divi-lite')}
      >
        <RangeContainer defaultUnit="px" min={0} max={100} />
      </ContextField>
      <ContextField
        attrName="grid_column_gap"
        subName="grid_column_gap"
        label={__('Column Gap', 'ms-gallery-for-divi-lite')}
        description={__('Set the gap between the columns.', 'ms-gallery-for-divi-lite')}
      >
        <RangeContainer defaultUnit="px" min={0} max={100} />
      </ContextField>
    </GroupContainer>
    <LinkGroup />
    <BackgroundGroup />
    <AdminLabelGroup
    />
  </React.Fragment>
);