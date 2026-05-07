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


/**
 * Design Settings panel for the Dynamic Module.
 */
export const SettingsDesign = (props) => (
  <React.Fragment>
    <GroupContainer
      id="image_style"
      title={__('Image Style', 'ms-gallery-for-divi-lite')}
    >
      <FieldContainer attrName="overlay_color.decoration.backgroundColor"
        subName="overlay_color"
        defaultValue={'#00000099'}
        label={__('Overlay Color', 'ms-gallery-for-divi-lite')}>
        <ColorPickerContainer />
      </FieldContainer>
      <FieldContainer
        attrName="overlay_text_color.decoration.color"
        subName="overlay_color"
        defaultValue={'#00000099'}
        label={__('Overlay Color', 'ms-gallery-for-divi-lite')}>
        <ColorPickerContainer />
      </FieldContainer>
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
);