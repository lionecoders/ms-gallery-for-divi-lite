import { addAction } from '@wordpress/hooks';

import { mgfdMsGallery, mgfdMsGalleryMetadata } from "./ms-gallery-module";

addAction('divi.moduleLibrary.registerModuleLibraryStore.after', 'mgfd', () => {
  const { registerModule } = window?.divi?.moduleLibrary || {};
  if (registerModule) {
    registerModule(mgfdMsGalleryMetadata, mgfdMsGallery);
  }
});