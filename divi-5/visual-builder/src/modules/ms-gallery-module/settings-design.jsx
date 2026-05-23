import React from 'react';

import { __ } from '@wordpress/i18n';
const { ColorPickerContainer } = window?.divi?.fieldLibrary;
const {
  AnimationGroup,
  BorderGroup,
  BoxShadowGroup,
  FiltersGroup,
  FieldContainer,
  GroupContainer,
  SizingGroup,
  SpacingGroup,
  TransformGroup,
} = window?.divi?.module;

const mgfdlContext = React.createContext(null);

const ContextField = ({ attrName, subName, children, defaultAttr: explicitDefaultAttr, ...rest }) => {
  const dsa = React.useContext(mgfdlContext);
  let computedDefaultAttr = explicitDefaultAttr;
  
  if (!computedDefaultAttr && dsa && attrName) {
    let raw = dsa?.[attrName]?.desktop?.value;
    console.log('ContextField lookup:', { attrName, subName, raw, dsa });
    
    if ((raw === undefined || raw === null) && attrName.includes('.')) {
      const rootKey = attrName.split('.')[0];
      raw = dsa?.[rootKey]?.desktop?.value;
    }
    
    if ((raw === undefined || raw === null) && subName) {
      raw = dsa?.[subName]?.desktop?.value;
    }
    
    if (raw !== undefined && raw !== null) {
      let scalar = raw;
      
      // Only extract subName property if it exists and is not an object
      if (subName && typeof raw === 'object' && !Array.isArray(raw)) {
        if (subName in raw) {
          scalar = raw[subName];
        } else {
          scalar = raw; // Use the whole object if subName key doesn't exist
        }
      }
      
      console.log('ContextField scalar:', { scalar, type: typeof scalar });
      
      // Only set computedDefaultAttr if scalar is actually defined
      if (scalar !== undefined && scalar !== null) {
        if (typeof scalar !== 'object' || Array.isArray(scalar)) {
          computedDefaultAttr = subName
            ? { desktop: { value: { [subName]: scalar } } }
            : { desktop: { value: scalar } };
        } else if (typeof scalar === 'object') {
          // If scalar is an object, use it directly
          computedDefaultAttr = { desktop: { value: scalar } };
        }
      }
    }
  }
  
  return React.createElement(
    FieldContainer,
    { attrName, subName, defaultAttr: computedDefaultAttr, ...rest },
    children
  );
};

/**
 * Design Settings panel for the Dynamic Module.
 */
export const SettingsDesign = (props) => (
  <mgfdlContext.Provider value={props.defaultSettingsAttrs}>
    <React.Fragment>
      <GroupContainer
        id="image_style"
        title={__('Image Style', 'ms-gallery-for-divi-lite')}
      >
        <ContextField attrName="overlay_color"
          label={__('Overlay Color', 'ms-gallery-for-divi-lite')}>
          <ColorPickerContainer />
        </ContextField>
        <ContextField
          attrName="overlay_text_color"
          label={__('Overlay Text Color', 'ms-gallery-for-divi-lite')}>
          <ColorPickerContainer />
        </ContextField>
        <BorderGroup attrName="image_style.decoration.border" />
      </GroupContainer>
      <SizingGroup />
      <SpacingGroup />
      <BorderGroup />
      <BoxShadowGroup />
      <FiltersGroup />
      <TransformGroup />
      <AnimationGroup />
    </React.Fragment>
  </mgfdlContext.Provider>
);