// External Dependencies
import React, { Component } from 'react';

// Internal Dependencies
import './MsGallery.css';

import { MGFD_gallery_style } from './mgfdHelper';


class MGFD_MsGallery extends Component {
  static slug = 'mgfd_ms_gallery';

  render() {
    const gallery_data = this.props.gallery_data;
    const gallery_style = this.props.gallery_style;

    return (
      <div className={`mgfd-ms-gallery-${gallery_style}-container`}>
        {Array.isArray(gallery_data) && gallery_data.length > 0 ? (
          gallery_data.map((item) => (
            <div
              className={`mgfd-ms-gallery-${gallery_style}-item`}
              key={item.id}
            >
              <img
                src={item.image_url}
                alt={item.alt || item.title || 'Gallery image'}
                title={item.title || ''}
                onError={(e) => {
                  console.error('Image failed to load:', item.image_url);
                  e.target.style.display = 'none';
                }}
              />
            </div>
          ))
        ) : (
          <p>No gallery items found.</p>
        )}
      </div>
    );
  }

  static css(props) {
    return MGFD_gallery_style(props);
  }
}


export default MGFD_MsGallery;
